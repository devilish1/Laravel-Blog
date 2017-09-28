

	var CatModel = function(src, name, clicks) {
	    this.src = src;
	    this.name = name;
	    
	    this.clicks = ko.observable(clicks);
	    this.level = ko.observable();
	}
	CatModel.prototype.showCat = function() {
			var self = this;
	        var index;
			catViewModel.cats().some(function (elem, i) {
			    return elem === self ? (index = i + 1, true) : false;
			});

			self.level(catViewModel.catSize(self.clicks()));
			catViewModel.activeCat(index);
	        
	        
	}
	

	function CatViewModel() {
	    var self = this;
	    
	    self.activeCat = ko.observable(0);

	    self.catSize = function(level){
	    	console.log('level is' + level);
	    	if(level < 10){
	    		return 'newborn';
	    	}
	    	else if(level < 25){
	    		return 'infant';
	    	}
	    	else if(level < 60){
	    		return 'teen';
	    	}
	    	else{
	    		return 'adult';
	    	}
	    }
	    
	    self.cats = ko.observableArray(
	        [
	            new CatModel('images/catImage.jpg', 'Cat 1', 0),
	            new CatModel('images/catImage2.jpg', 'Cat 2', 0),
	            new CatModel('images/catImage3.jpg', 'Cat 3', 0),
	            new CatModel('images/catImage4.jpg', 'Cat 4', 0),
	            new CatModel('images/catImage5.jpg', 'Cat 5', 0),
	        ]);

	    self.incrementClickCounter = function(){
	    	var activeCat = self.cats()[self.activeCat()-1];

	    	activeCat.clicks(activeCat.clicks()+1);


	    	activeCat.level(self.catSize(activeCat.clicks()));


	    }

		self.catName = function(){
			return self.activeCat() !== 0 ? self.cats()[self.activeCat()-1].name : '';
		}

		self.catLevel = function(){
			return self.activeCat() !== 0 ? self.cats()[self.activeCat()-1].level() : '';
		}

		self.catSrc = function(){
			return (self.activeCat() !== 0 ? self.cats()[self.activeCat()-1].src : '');
		}

		self.catClicks = function(){
			return (self.activeCat() !== 0 ? self.cats()[self.activeCat()-1].clicks() : -1);
		}

	};


		

	var catViewModel = new CatViewModel();

$(function() {
	    ko.applyBindings(catViewModel);
	    catViewModel.activeCat(0);
});