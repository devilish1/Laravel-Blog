$(function() {
    //initilaise a model based on an input array [[cat picture location, cat name], [],[], ...]
    var Model = function(catsArray) {
        this.init(catsArray);
    };
    Model.prototype = {

    	//create cat objects inside the model and save them to a cats variable
        init: function(catsArray) {
            var catsObjects = [];
            for (var i = 0; i < catsArray.length; i++) {
                (function(i) {
                    catsObjects.push({
                        name: catsArray[i][1],
                        src: catsArray[i][0],
                        clicked: 0
                    })
                })(i);
            }
            this.cats = catsObjects;
        }
    }

    //creating a controller will create the whole app
    var Controller = function(catArray) {
        this.model = new Model(catArray);
        this.linkView = new LinkView(this);
        this.catView = new CatView(this);
        this.adminView = new AdminView(this);
    }

    Controller.prototype = {
    	/**
    	* change the current cat the the input cat
    	*/
        changeCat: function(catObject) {
            if (this.getCats().indexOf(catObject) !== -1) {
                this.catView.render(catObject);
            }
        },

        /**
    	* increment the cat clicked counter
    	*/
        incrementCounter: function() {
            if (this.getCats().indexOf(this.catView.activeCat) !== -1) {
                this.catView.activeCat.clicked++;
                this.catView.render(this.catView.activeCat);
            }
        },

        /**
    	* return the cats variable from the model
    	*/
        getCats: function() {
            return this.model.cats;
        },

        /**
    	* show the admin button if it is not visible
    	*/
        showAdminButton: function() {
        	console.log(this.adminView.adminDivOuter.style);
            if (this.adminView.adminDivOuter.style.display === '') {
                this.adminView.adminDivOuter.style.display = 'block';
            }
        },

        /**
    	* change the name of the cat and the number of clicks for the current cat based on the input arguments
    	*/
        adminAccess: function(newName, newCount) {
            this.catView.activeCat.name = newName;
            this.catView.activeCat.clicked = (isNaN(newCount) ? this.catView.activeCat.clicked : newCount);
            this.catView.render();
        }
    };

    var LinkView = function(controller) {
        this.controller = controller;
        this.init();
    }

    LinkView.prototype = {
    	//create the links to different cats based on the information from the model
        init: function() {

            var catDiv = $( "#main-blog" )[ 0 ];
            var div = $( "#catgame-links" )[ 0 ];
            
            var controller = this.controller;
            var cats = this.controller.getCats();
            for (var i = 0; i < cats.length; i++) {
                (function(currentElement) {
                    a = document.createElement('a');
                    a.innerHTML = cats[currentElement]['name'];
                    div.appendChild(a);
                    div.appendChild(document.createElement('br'));

                    //add an event listener when the cat link is clicked
                    a.addEventListener('click', function() {
                        controller.changeCat(controller.getCats()[currentElement]);
                        console.log('test');
                        controller.showAdminButton();
                    });
                })(i);
            }
            catDiv.appendChild(div);
        }
    }

    var CatView = function(controller) {
        this.controller = controller;
        this.init();
    }
    CatView.prototype = {
    	/**
    	* create the cat picture view and hide it
    	*/
        init: function() {
            var mainDivBlog = $( "#main-blog" )[ 0 ];
            var catDiv = $( "#catgame-cat" )[ 0 ];

            this.name = $( "#catgame-name" )[ 0 ];
            this.img = $( "#catgame-img" )[ 0 ];
            this.clicksElement =$( "#catgame-clicks" )[ 0 ];

            this.activeCat = null;

            var controller = this.controller;
            this.img.addEventListener('click', function() {
                controller.incrementCounter();
            });
        },

        /**
    	* change the current cat the the clicked cat
    	*/
        render: function(catObject) {
            $( "#catgame-cat" )[ 0 ].style.display = 'block';

            this.activeCat = catObject || this.activeCat;
            this.img.src = this.activeCat['src'];
            this.name.innerHTML = this.activeCat['name'];
            this.clicksElement.innerHTML = this.activeCat['clicked'] + ' clicks!!';
        }
    }

    var AdminView = function(controller) {
        this.controller = controller;
        this.init();
    }

    AdminView.prototype = {
    	/**
    	* create the admin button and the input for changing the cat name and number of clicks, hide it all
    	*/
        init: function() {
            this.adminButton = $( "#catgame-admin-button" )[ 0 ];
            this.adminDivOuter = $( ".catgame-admin" )[ 0 ];
            var nameInput = $( "#catgame-newName" )[ 0 ];
            var countInput = $( "#catgame-newCount" )[ 0 ];
            var submitButton = $( "#catgame-submit-button" )[ 0 ];


            this.adminButton.addEventListener('click', function() {
            	var adminDiv = $( "#catgame-admin-info" )[ 0 ];
                if (adminDiv.style.display === '') {
                    adminDiv.style.display = 'block';
                } else {
                    adminDiv.style.display = '';
                }
            });
            var controller = this.controller;
            submitButton.addEventListener('click', function() {
                controller.adminAccess(nameInput.value, countInput.value);
            });
        }
    }

    /**
    * start the app
    */
    var controller = new Controller([
        ['images/catImage.jpg', 'Cat 1'],
        ['images/catImage2.jpg', 'Cat 2'],
        ['images/catImage3.jpg', 'Cat 3'],
        ['images/catImage4.jpg', 'Cat 4'],
        ['images/catImage5.jpg', 'Cat 5']
    ]);
});