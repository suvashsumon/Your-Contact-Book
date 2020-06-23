//this function add contacts to view table
function showAddedContact() {
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var tags = document.getElementById("tags").value;
    var tableBody = document.getElementById("contactTable");
    if (name != '') {
        tableBody.innerHTML += `
    <tr>
                <td>${name}</td>
                <td>${address}</td>
                <td>${email}</td>
                <td>${phone}</td>
                <td>${tags}</td>
            </tr>`;
    }
}
