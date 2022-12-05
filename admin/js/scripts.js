const getCheckbox = document.getElementById('selectAllBoxes');
const allCheckbox = document.querySelectorAll('.checkBoxes')

function updateCheckBox(params) {
    if(getCheckbox.checked) {
       allCheckbox.forEach((checkbox) => {
           checkbox.checked = true
           console.log("we are here")
       })
    } else {
        allCheckbox.forEach((checkbox) => {
            checkbox.checked = false
            console.log("we are not here")
        })
    }
}


const checkboxEvent = getCheckbox.addEventListener('change', updateCheckBox)


