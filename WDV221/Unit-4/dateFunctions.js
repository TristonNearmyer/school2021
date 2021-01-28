// JavaScript Document

//The following functions use the current date as their basis.  The function will return the requested portion (formatted) of the current date 

	function getCurrentDayOfWeek()
	{
		var todaysDate = new Date();			//create a new date object with current date
		
		var dayOfWeek = todaysDate.getDay();	//get the value of the day from current date
		
		
		//Change the dayOfWeek from a 0-6 number to the name of the day
		switch(dayOfWeek) {
			case 0:
				dayOfWeek = "Sunday";
				break;
			case 1:
				dayOfWeek = "Monday";
				break;
			case 2:
				dayOfWeek = "Tuesday";
				break;
			case 3:
				dayOfWeek = "Wednesay";
				break;
			case 4:
				dayOfWeek = "Thursday";
				break;
			case 5:
				dayOfWeek = "Friday";
				break;
			case 6:
				dayOfWeek = "Saturday";
				break;		
			default:
				dayOfWeek = "";
				break;
		}
	
		
		return dayOfWeek;	//send result back to where it was called
		
	}//end of currentDayOfWeek( )


	function getCurrentDate()
	{
		var todaysDate = new Date();	//create a date object with the current date
		
		
		return todaysDate.getDate();	//get the date from the current date
	}//end of getCurrentDate( )
	
	
	function getCurrentMonthName()
	{
		var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		
		var todaysDate = new Date();			//create a date object with the current date
		
		
		return months[ todaysDate.getMonth()];	//get the month as a word
	}//end getCurrentMonth( )
	
	
	function getCurrentYear()
	{
		var todaysDate = new Date();		//create a date object with current date
		
		
		return todaysDate.getFullYear();	//get the four digit year from the current date
	}//end getCurrentYear( )
	

//The following functions can be used for any date.  Pass in the required Month, Day, Year and the function will return the requested information
//NOTE the use of inMonth-1. This allows the user to enter the actual month number 1-12. It will then be converted the Javascript Date object range for months of 0-11.

	function getDayOfWeekOfDate(inMonth,inDay,inYear)
	{
		var daysOfWeek = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
		
		var workingDate = new Date(inYear, inMonth-1, inDay);		//create a date object using the parameters
		
		return daysOfWeek[workingDate.getDay()];				//get the day of the week from the date object
		
	}//end getDayOfWeek( )


	function getDateOfDate(inMonth,inDay,inYear)
	{
		var workingDate = new Date(inYear, inMonth-1, inDay);		//create a date object using the parameters
		
		return workingDate.getDate();							//get the date from the date object
		
	}//end getDateOfDate( )

	
	function getMonthOfDate(inMonth,inDay,inYear)
	{
		alert("inside getMonthOfDate() inMonth is " + inMonth);
		
		var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
		
		var workingDate = new Date(inYear, inMonth-1, inDay);			//create a date object with the current date
		
		alert("getMonthOfDate " + workingDate.getMonth() );
		
		return months[ workingDate.getMonth()];	//get the month as a word
	}//end getCurrentMonth( )
	

	function getYearOfDate(inMonth,inDay,inYear)
	{
		var workingDate = new Date(inYear, inMonth-1, inDay);		//create a date object using the parameters
		
		return workingDate.getFullYear();						//get the four digit year from the date object
	}//end getYearOfDate( )


