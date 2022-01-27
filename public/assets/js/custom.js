const deleteButtons = document.querySelectorAll('.delete-button');
const doneInputs = document.querySelectorAll('.done-input');

doneInputs.forEach( singleInput => {
    singleInput.addEventListener('click', function(e) {
       const checkboxStatus = e.target.checked;
       const targetId = e.target.parentElement.parentElement.dataset.id;

    
       let response = fetch("updateTaskDone.php", {
           method: "POST",
           headers: {
               'content-type': 'application/json'
           },
           body: JSON.stringify( {
               id: targetId,
               checkboxStatus: checkboxStatus
           })
           }).then(( response ) => {
               return response.text();
               
           }).then( (text) => {
               console.log(text);
           })
    });
});

    deleteButtons.forEach( singleButton => {
        singleButton.addEventListener('click', function(e) {
            console.log(e.target);
           const targetId = e.target.parentElement.parentElement.dataset.id;
        });
    });
