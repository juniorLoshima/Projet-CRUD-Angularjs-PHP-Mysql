app = angular.module("mon_app", []);
app.controller("mon_controller", function($scope, $http) {

    //méthode d'insertion des données vers la BDD
    $scope.insertData = function() {
            if ($scope.prenom == null) {
                document.getElementById('erreur-prenom').innerHTML = "veillez saisir votre prenom";
            } else if ($scope.nom == null) {
                document.getElementById('erreur-nom').innerHTML = "veillez saisir votre nom";
            } else if ($scope.email == null) {
                document.getElementById('erreur-email').innerHTML = "veillez saisir votre email";
            } else {
                $http.post(
                    "insertion.php", {
                        'prenom': $scope.prenom,
                        'nom': $scope.nom,
                        'email': $scope.email
                    }
                ).success(function(data) {
                    $scope.message = data;
                    $scope.prenom = null;
                    $scope.nom = null;
                    $scope.email = null;
                    $scope.displayData();
                });
            }

        }
        // méthode pour la modification 
    $scope.updateData = function() {
            $http.post(
                "update.php", {
                    'prenom': $scope.prenom,
                    'nom': $scope.nom,
                    'email': $scope.email,
                    'id': $scope.id
                }
            ).success(function(data) {
                $scope.message = data;
                $scope.prenom = null;
                $scope.nom = null;
                $scope.email = null;
                $scope.id = null;
                $scope.displayData();
            });
        }
        // méthode pour la suppression 
    $scope.deleteData = function(data) {
        $http.post(
            "suppression.php", {
                'id': $scope.id
            }
        ).success(function() {
            $scope.message = "Suppression effectuée avec succès";
            $scope.displayData();
        });
    }

    //méthode de mise à jour des informations
    $scope.update = function(id, prenom, nom, email) {
            $scope.id = id;
            $scope.prenom = prenom;
            $scope.nom = nom;
            $scope.email = email;
        }
        // méthode d'affichage des données au chargement
    $scope.displayData = function() {
        $http.get("selection.php").success(function(data) {
            $scope.users = data;
        });
    }
});