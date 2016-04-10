var app = angular.module('application', ['ui.bootstrap', 'truncate', 'checklist-model', 'ngAnimate']);

app.controller('Message', ['$scope', '$filter', '$http', '$location', '$timeout', function ($scope, $filter, $http, $location, $timeout) {

    $scope.inboxMode = true;
    $scope.composeMode = false;
    $scope.replyMode = false;
    $scope.viewMode = false;

    $scope.groupBtn = false;
    $scope.loaded = false;

    $scope.visibleSpamBtn = true;
    $scope.visibleInboxBtn = false;

    $scope.filter_with = false;

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 10;
    $scope.query = '';

    var url = window.location.href;
    var queryString = {};
    url.replace(
        new RegExp("([^?=&]+)(=([^&]*))?", "g"),
        function($0, $1, $2, $3) { queryString[$1] = $3; }
    );
    if(queryString && queryString['id'] && queryString['id'] != 'undefined' && queryString['id'] != '')
    {
        $scope.inboxMode = false;
        $scope.composeMode = false;
        $scope.replyMode = false;
        $scope.viewMode = true;
        $scope.mgsID = queryString['id'];
        getSingleMgs(queryString['id']);
    }


    $scope.changeViewMode = function(mode){
        $scope.loaded = false;
        if(mode == 1){
            $scope.inboxMode = false;
            $scope.viewMode = false;
            $scope.replyMode = false;
            $scope.composeMode = true;
        }
        else if(mode == 3){
            $scope.inboxMode = false;
            $scope.composeMode = false;
            $scope.viewMode = true;
            $scope.replyMode = true;
            getSingleMgs($scope.mgsID);
        }
        else{
            $scope.inboxMode = true;
            $scope.composeMode = false;
            $scope.replyMode = false;
            $scope.viewMode = false;
        }
        $scope.loaded = true;
    }

    getData();

    function getData() {
        $http.get('/messages/inbox?page=' + $scope.currentPage + '&size=' + $scope.pageSize +'&filter_with=' + $scope.filter_with + '&search=' + $scope.query)
            .success(function (response) {
                $scope.activity = [];
                $scope.totalItems = response.count;
                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;

                $scope.endItem = $scope.currentPage * $scope.pageSize;
                if (($scope.currentPage * $scope.pageSize) >= $scope.totalItems) {
                    $scope.endItem = $scope.totalItems;
                }
                $scope.messages = response.messages;
                $scope.loaded = true;
            }
        );
    }

    function getSelected() {
        getData();
        $scope.userMgs.ids = $scope.messages.map(function(item) { return item.id; });
        $scope.isDeselect = true;
        isVisibleGroupBtns();
    }


    function isVisibleGroupBtns() {
        if($scope.userMgs.ids.length > 0)
        {
            $scope.groupBtn = true;
        }
        else{
            $scope.groupBtn = false;
        }
    }

    $scope.userMgs = {
        ids: null
    };

    $scope.isDeselect = false;

    $scope.checkAll = function(value) {

        if(value == 'all')
        {
            getSelected();
        }
        else if(value == 'read')
        {
            $('#checkBtn').prop('checked', true);
            $scope.filter_with = 'read';
            getSelected();
        }
        else if(value == 'unread')
        {
            $('#checkBtn').prop('checked', true);
            $scope.filter_with = 'unread';
            getSelected();
        }
        else if($scope.isDeselect == true)
        {
            $scope.userMgs.ids = []
            $scope.isDeselect = false;
            $scope.groupBtn = false;
        }
        else if($scope.isDeselect == false)
        {
            getSelected();
        }
    };

    $scope.selectMe = function()
    {
        isVisibleGroupBtns();
    }

    $scope.refresh = function()
    {
        $scope.loaded = false;
        getData();
    }

    $scope.markAs = function(action) {
        $scope.loaded = false;
        $http({
            url: 'messages/markAs',
            method: "POST",
            data: {ids: $scope.userMgs.ids, action: action},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                getData();
                $scope.groupBtn = false;
                $scope.userMgs.ids = null;
                $('#checkBtn').prop('checked', false);
                toastr.success('Message has been marked as ' + action + ' successfully');
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            }
        );

    };

    $scope.makeStartedToggle = function (userMgsID, value) {
        $scope.loaded = false;
        if(value == 1)
        {
            makeStarted = 2
        }
        else{
            makeStarted = 1
        }

        $http({
            url: '/messages/makeStartedToggle',
            method: "POST",
            data: {userMgsID: parseInt(userMgsID), makeStarted: makeStarted, value: value},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                if(response == 1)
                {
                    toastr.error('Message has been removed from starred list');
                }
                else if(response == 2)
                {
                    toastr.success('Message has been marked as starred');
                }
                else{
                    toastr.error('Sorry, something went wrong');
                }
                getData();
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
    }

    $scope.pageChanged = function (currentPage) {
        $scope.currentPage = currentPage;
        getData();
    }

    $scope.pageSizeChanged = function (pageSize) {
        $scope.pageSize = pageSize;
        getData();
    }

    $scope.filterWith = function (filterWith) {
        if(filterWith == 'spam')
        {
            $scope.visibleSpamBtn = false;
            $scope.visibleInboxBtn = true;
        }
        else if(filterWith == 'trash'){
            $scope.visibleSpamBtn = true;
            $scope.visibleInboxBtn = true;
        }
        else{
            $scope.visibleSpamBtn = true;
            $scope.visibleInboxBtn = false;
        }

        $scope.inboxMode = true;
        $scope.composeMode = false;
        $scope.replyMode = false;
        $scope.viewMode = false;


        $scope.currentPage = 1;
        $scope.totalItems = 0;
        $scope.pageSize = 10;

        $scope.userMgs.ids = []
        $scope.filter_with = filterWith;
        getData();
    }

    $scope.visibleMessage = function (mgsID) {
        $scope.inboxMode = false;
        $scope.composeMode = false;
        $scope.replyMode = false;
        $scope.viewMode = true;
        $scope.mgsID = mgsID;
        getSingleMgs(mgsID);
    }

    function getSingleMgs(mgsID)
    {
        $http({
            url: 'messages/getMgs?id='+mgsID,
            method: "GET",
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                console.log(response);
                $scope.singleMgs = response;
            })
            .error(function (response, status, headers, config) {
                console.log(response);
            }
        );
    }

}]);


app.filter('htmlToPlaintext', function() {
    return function(text) {
        return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    }
});
