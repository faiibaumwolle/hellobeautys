class FacebookAgent {

  constructor() {
	  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '500422933475064',
		    cookie     : true,  // enable cookies to allow the server to access 
		                        // the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.8' // use graph api version 2.8
		  });

		  FB.getLoginStatus(function(response) {

		    if (response.status === 'connected') {
			    FB.api('/me', function(response) {
				  	console.log("Response");
				    console.log(response);
				    console.log(response.first_name);
			    });
			}
		  });
	  };

	  // Load the SDK asynchronously
	  (function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src="https://connect.facebook.net/en_US/all.js";
	    fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
  }

  connectToFacebook(){

		console.log("TEST");

	    FB.getLoginStatus(function(response) {
		    if (response.status === 'connected') {
			    FB.api('/me', {fields: 'id, email, first_name, last_name, gender'}, function(response) {
				  	console.log("Response");
				    console.log(response);

	  	            const rdm = new RegistrationDataManager();
	                const rpd = new RegistrationPersonalData(
	                    response.email,
	                    "",
	                    response.first_name,
	                    response.last_name,
	                    response.gender,
	                    ""
	                    );
	                rdm.insertData(rpd);

			    });
			}
	    });
  }

}