( function( api ) {

	// Extends our custom "medical-landing-page" section.
	api.sectionConstructor['medical-landing-page'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );