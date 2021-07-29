const form = document.querySelector("form")
form.addEventListener("submit", validate)

function validate(e) {
    e.preventDefault()
    const fullName = document.getElementById("Full_Name").value
    const email = document.getElementById("Email").value
    const password = document.getElementById("Password").value
    const gender = document.getElementsByName("gender")
    const hobby = document.getElementsByName("hobby")
    const file = document.getElementById("file")
    const errors = []

    if(fullName.length === 0)
        errors.push("Name is required")
    if(!email.includes('@'))
        errors.push("Email is not valid")
    if(password.length < 6)
        errors.push("Password is too short")
    if(!isGenderSelected(gender))
        errors.push("Select a gender")
    if(!isHobbySelected(hobby))
        errors.push("Select at least one hobby")
    if(file.files.length === 0)
        errors.push("Select an image")

    const div = document.getElementById("errors")
    div.innerHTML = ""
    if(errors.length > 0)
        errors.forEach(e => div.innerHTML += `<p style="color: red">${e}</p>`)
    else
        div.innerHTML = "<p style='color: green'>Form is validated</p>"
}

function isGenderSelected(gender) {
    for (const g of gender)
        if(g.checked) return true
    return false
}

function isHobbySelected(hobby) {
    for (const h of hobby)
        if(h.checked) return true
    return false
}