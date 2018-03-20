
    var app = angular.module('student', [] , function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('<<');
                    $interpolateProvider.endSymbol('>>');
                }, [ '$httpProvider', function ($httpProvider) {
                          $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
                                      }]
              );

    //global Constant Variables
    app.constant('API_URL', 'http://localhost:8000/api/');



    // < CONTROLLER ITEMS ITEMS ITEMS ITEMS >
    app.controller('StudentController', function($scope, $http, API_URL) {

        $scope.debugDisplayer = " Dubug text goes here";
        $scope.raw_post = { };
        $scope.targetScope = 'class';

        var user_id = document.getElementsByName("user_id")[0].value;
        var fetchPage = 1 ;



        //Common Variables
        var errorMessage = "This is embarassing. \n An error has occured. \n Please Contact Support Person";
        var responsePrefix= "response is ==>";
        var successMessage= "request was successfull";

        //0.0 Displaying All Available items
        console.log("Up and running....");



        var request = $http.get( API_URL + "post/all/read/"+user_id+ "/"+ fetchPage);
        request.then(function successCallback(response) {
            console.log("request succeeded");
            console.log(response);
            console.log(response.data);
            $scope.debugDisplayer=response.data.posts;
            $scope.posts = response.data.posts;

        }, function errorCallback(response) {
            console.log("Something is wrong ");
            console.log(response);
            $scope.debugDisplayer=response.data;
            alert(errorMessage );

        });




        $scope.showComposeForm = function(){
            $('#composePostModal').modal('show');
        };


        //1.0 Send A Post
        $scope.sendPost = function(modalstate,userId) {

            var url = API_URL + "post/create";

            $scope.raw_post.user_id = userId ;
            $scope.raw_post.target = $scope.targetScope ;

            if (modalstate === 'edit'){
                url += "/" + id;
            }

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.raw_post),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then( function successCallback(response) {
                    console.log(responsePrefix + response);
                    console.log(response.data);
                    $scope.debugDisplayer = response.data ;
                    //location.reload();
                    $scope.raw_post ={ };
                },
                function errorCallback (response) {
                    $scope.displayer = response.data;
                    console.log(responsePrefix + response);
                    $scope.debugDisplayer = response.data ;
                    alert(errorMessage);
                }
            );

            $('#composePostModal').modal('hide');

        };



    });

