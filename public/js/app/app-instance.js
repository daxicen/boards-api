
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
    app.controller('MainController', function($scope, $http, API_URL) {

        $scope.debugDisplayer = " Dubug text goes here";
        $scope.rawAppInstance = { };

        //Common Variables
        var errorMessage = "This is embarassing. \n An error has occured. \n Please Contact Support Person";
        var responsePrefix= "response is ==>";
        var successMessage= "request was successfull";

        //0.0 Displaying All Available items
        console.log("Ready to register....");





        //1.0 Send A Post
        $scope.registerApp = function() {

            var url = API_URL + "app/register";

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.rawAppInstance),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then( function successCallback(response) {
                    console.log(responsePrefix + response);
                    console.log(response.data);
                    $scope.debugDisplayer = response.data.instance ;
                    $scope.rawAppInstance ={ };
                },
                function errorCallback (response) {
                    $scope.displayer = response.data;
                    console.log(responsePrefix + response);
                    $scope.debugDisplayer = response.data ;
                    alert(errorMessage);
                }
            );


        };



    });

