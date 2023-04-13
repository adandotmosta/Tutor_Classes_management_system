
function sendData() {
    // Get a reference to the radio buttons
    const radioBtns = document.querySelectorAll('input[name="marker"]');
    
    // Find the selected radio button
    let selectedValue;
    for (let i = 0; i < radioBtns.length; i++) {
      if (radioBtns[i].checked) {
        selectedValue = radioBtns[i].value;
        break;
      }
    }
    
    // If a radio button is selected, send its value to the server
    if (selectedValue) {
      // Create a new XMLHttpRequest object
      const xhr = new XMLHttpRequest();
    
      // Set up a callback function to handle the response from the server
      xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          console.log("oiooef");
        }
      };
    
      // Open the request and set the HTTP method to POST
      xhr.open("POST", "holiday.php", true);
    
      // Set the request header
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
      // Send the request with the selected value as data
      xhr.send("selectedValue=" + selectedValue);
    }
  }

