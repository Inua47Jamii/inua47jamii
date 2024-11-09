function checkPassword() {
    // Retrieve the password entered by the user
    const passwordInput = document.getElementById("password").value;
    
    // The correct password (in this case, directly "DICKENS")
    const correctPassword = "DICKENS";

    // Check if the entered password matches the correct one
    if (passwordInput === correctPassword) {
        // Display the link if the password is correct
        document.getElementById("link").style.display = "block";
    } else {
        // Alert the user if the password is incorrect
        alert("Incorrect password. Please try again.");
    }
}
