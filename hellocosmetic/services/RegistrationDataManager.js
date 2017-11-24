class RegistrationDataManager extends DataManager{
  

  collectData(){
  	// import RegistrationConsentManager from 'RegistrationConsentManager';
  	const rcm = new RegistrationConsentManager();
  	return rcm.checkConsent();
  }

  insertData(personalData){
  	
  }
}