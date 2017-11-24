class RegistrationPersonalData {

   constructor(email, password, firstname, lastname, gender, tel) {
   		this.email = email;
   		this.password = password;
   		this.firstname = firstname;
   		this.lastname = lastname;
   		this.gender = gender;
   		this.tel = tel;
   }

	setEmail(email){
		this.email = email;
	}

	getEmail(){
		return this.email;
	}

	setFirstName(firstname){
		this.firstname = firstname;
	}

	getFirstName(){
		return this.firstname;
	}

	setLastName(lastname){
		this.lastname = lastname;
	}

	getLastName(){
		return this.lastname;
	}

	setGender(gender){
		this.gender = gender;
	}

	getGender(){
		return this.gender;
	}

	setTel(tel){
		this.tel = tel;
	}

	getTel(){
		return this.tel;
	}
}