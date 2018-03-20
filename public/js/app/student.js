
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
        $scope.rawStudent = { };
        $scope.loginInfo = { };
        $scope.loginStatus = "unknown";

        var appInstance = document.getElementsByName("app_instance")[0].value;


        //Common Variables
        var errorMessage = "This is embarassing. \n An error has occured. \n Please Contact Support Person";
        var responsePrefix= "response is ==>";
        var successMessage= "request was successfull";

        //0.0 Displaying All Available items
        console.log("Ready to register....");





            //1.0 Register a student
            $scope.registerStudent = function() {

            var url = API_URL + "student/create";

            $scope.rawStudent.app_instance = appInstance ;

            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.rawStudent),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then( function successCallback(response) {
                    console.log(responsePrefix + response);
                    console.log(response.data);
                    $scope.debugDisplayer = response.data.message ;
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


            // 2.0 update Academic info
            $scope.addAcademicInfo = function() {

                //get the original student data
                var request = $http.get( API_URL + "student/details/"+ appInstance);
                request.then(function successCallback(response) {
                    console.log("request succeeded");
                    console.log(response);
                    console.log(response.data);
                    $scope.debugDisplayer=response.data;
                    $scope.retrievedStudent = response.data.student;
                    returnUpdateAcademics();

                }, function errorCallback(response) {
                    console.log("Something is wrong ");
                    console.log(response);
                    $scope.debugDisplayer=response.data;
                    alert(errorMessage );

                });


            };

            var returnUpdateAcademics=function () {
                //update and return the student
                $scope.retrievedStudent.department = $scope.rawStudent.department;
                $scope.retrievedStudent.course = $scope.rawStudent.course;
                $scope.retrievedStudent.year = $scope.rawStudent.year;

                var url = API_URL + "student/update/" + appInstance;
                $http({
                    method: 'POST',
                    url: url,
                    data: $.param($scope.retrievedStudent),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then( function successCallback(response) {
                        console.log(responsePrefix + response);
                        console.log(response.data);
                        $scope.debugDisplayer = response.data.meassage ;
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


            //3.0 update title
            $scope.updateStudentTitle = function() {

            //get the original student data
            var request = $http.get( API_URL + "student/details/"+ appInstance);
            request.then(function successCallback(response) {
                console.log("request succeeded");
                console.log(response);
                console.log(response.data);
                $scope.debugDisplayer=response.data;
                $scope.retrievedStudent = response.data.student;
                returnUpdatedTitle();

            }, function errorCallback(response) {
                console.log("Something is wrong ");
                console.log(response);
                $scope.debugDisplayer=response.data;
                alert(errorMessage );

            });


            };

            var returnUpdatedTitle=function () {
            //update and return the student
            $scope.retrievedStudent.title = $scope.rawStudent.title;

            var url = API_URL + "student/update/" + appInstance;
            $http({
                method: 'POST',
                url: url,
                data: $.param($scope.retrievedStudent),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then( function successCallback(response) {
                    console.log(responsePrefix + response);
                    console.log(response.data);
                    $scope.debugDisplayer = response.data.meassage ;
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

            //4.0 Register a student
            $scope.login = function() {

                var url = API_URL + "student/login/" + appInstance ;

                $http({
                    method: 'POST',
                    url: url,
                    data: $.param($scope.loginInfo),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then( function successCallback(response) {
                        console.log(response);
                        console.log(response.data);
                        $scope.rawStudent = response.data.student ;
                        $scope.loginStatus = response.data.status  ;
                        console.log(JSON.stringify($scope.rawStudent));
                        console.log($scope.loginStatus);
                        $scope.debugDisplayer = JSON.stringify($scope.rawStudent) ;

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

