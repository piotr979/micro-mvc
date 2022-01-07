const deleteButtons = document.querySelectorAll('.delete-button');
const doneInputs = document.querySelectorAll('.done-input');

doneInputs.forEach( singleInput => {
    singleInput.addEventListener('click', function(e) {
       const checkboxStatus = e.target.checked;
       const targetId = e.target.parentElement.parentElement.dataset.id;
       
       // TODO: pass to php to save to database 
    });
});

    deleteButtons.forEach( singleButton => {
        singleButton.addEventListener('click', function(e) {
            console.log(e.target);
           const targetId = e.target.parentElement.parentElement.dataset.id;
        });
    });
