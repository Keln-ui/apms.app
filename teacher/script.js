document.addEventListener("DOMContentLoaded", function() {
    const gradeForm = document.querySelector("form[action='enter_grade.php']");

    gradeForm.addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Grade submitted successfully!");

        // Optionally, you can add an AJAX call here to submit the form data without reloading the page
        // Example:
        // const formData = new FormData(gradeForm);
        // fetch('enter_grade.php', {
        //     method: 'POST',
        //     body: formData
        // })
        // .then(response => response.text())
        // .then(result => {
        //     console.log(result);
        //     alert("Grade submitted successfully!");
        // })
        // .catch(error => {
        //     console.error('Error:', error);
        //     alert("An error occurred. Please try again.");
        // });
    });
});
