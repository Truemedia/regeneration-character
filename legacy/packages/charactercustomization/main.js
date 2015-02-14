import {Package} from './../../regeneration/package_sample';	

	/** 
     * Character Customization package
     * @class
     */
	export default class CharacterCustomization extends Package
	{
		/* Initial load-up procedure if first time package is loaded */
		init(options)
		{		
			// Save options
			this.settings = (Object.keys(options).length === 0) ? Config.get('highscores::defaults') : options;
		}
			
		/**
		 * Autoloading hook
		 * @constructs CharacterCustomization
		 * @param {object} element - HTML element the package is tied to in the DOM.
		 * @param {object} options - JSON string of options passed from the data-options attribute.
		 */
        constructor(element, options = null)
        {
        	super(element);

   //      	// Initialization code
   //      	this.init(options);

   //      	// View pre-processing
			// if (jQuery(element).html().length === 0) { new this.view({el: element}); }

			// // View post-processing
			// else { this.view.post_render(element); }
			// alert(this.wade);
        }
	        
	    /* Data collection */
	    // collection: Backbone.Collection.extend({
	    //     url: function() { return Config.get('highscores::routes.' + highscores.settings.source); },
	    //     parse: function(data) { return data.items; }
	    // }),
	        
	    /* Append the HTML for this package to the DOM */
	    // view: Backbone.View.extend({
	    //     initialize: function()
	    //     {    	
	    //         this.collection = new highscores.collection({model: Backbone.Model.extend()});
	    //         this.render();
	    //     },
	    //     render: function()
	    //     {
	    //         // Load package stored data
	    //     	var self = this;
	    //         this.collection.fetch().done( function()
	    //         {		
	    //         	// Compose data for view
	    //         	var data = {
	    //         		items: self.collection.toJSON(),
	    //         		trans: highscores.trans
	    //         	};
	    				
	    //         	// Render content
	    //         	self.$el.html( tpl(data) )
	    //         		.promise()
	    //         		.done( self.post_render(self.$el) );
	    //         });
	    //     },
	    //     post_render: function(element)
	    //     {
	    //     	ko.applyBindings(new vm(), jQuery(element).get(0));
	    //     }
	    // })
	}