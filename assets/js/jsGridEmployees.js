  callGrid(JSON.parse(employees));

  function callGrid(employees) {

    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      filtering: false,
      inserting: true,
      editing: false,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete this employee?",
      controller: {
        insertItem: function (newEmployee) {
          return $.ajax({
            type: "POST",
            url: "../../employeeController/addEmployeeAjax",
            dataFilter: function(response) {
              return JSON.parse(response)
            },
            data: {
              controller: "employee",
              action: "addEmployeeAjax",
              newEmployee: newEmployee,
            }
          }).done(function (response) {
            if (Object.prototype.toString.call(response) != '[object String]') {
              alertsMsg('Success creating employee');
            }
          });
        },
        deleteItem: function (employee) {
          return $.ajax({
            type: "DELETE",
            url: "../../employeeController/deleteEmployeeAjax",
            data: {
              deleteId: employee.id
            },
          }).done(function (response) {
            alertsMsg(response);
          });
        }
      },
      rowDoubleClick: function (row) {
        window.location.href = `../../employeeController/addEditEmployee/${row.item.id}`
      },

      data: employees,

      fields: [{
          name: "id",
          title: "Id",
          visible: false,
          width: 0
        },
        {
          name: "name",
          title: "Name",
          type: "text",
          width: 100
        },
        {
          name: "email",
          title: "Email",
          type: "text",
          width: 200
        },
        {
          name: "age",
          title: "Age",
          type: "number",
          width: 65,
          align: "center"
        },
        {
          name: "streetAddress",
          title: "Street No.",
          type: "text",
          width: 100
        },
        {
          name: "city",
          title: "City",
          type: "text",
          width: 120
        },
        {
          name: "state",
          title: "State",
          type: "text",
          width: 70
        },
        {
          name: "postalCode",
          title: "Postal Code",
          type: "text",
          width: 100
        },
        {
          name: "phoneNumber",
          title: "Phone Number",
          type: "text",
          width: 140
        },
        {
          type: "control",
          editButton: false,
          width: 50
        }
      ]
    });

  }

$("#dashboardNav").addClass("nav-active");

function alertsMsg(response) {

  const alertMsg = document.querySelector('#dashboardErrMsg');
  alertMsg.classList.remove('alert-danger','alert-success');

  if (response.includes('Success') || parseInt(response) >= 0) {
      alertMsg.textContent = response;
      alertMsg.classList.add('alert-success');
      alertMsg.classList.replace('d-none', 'd-flex');
      setTimeout(() => {
        alertMsg.classList.replace('d-flex', 'd-none');
        alertMsg.classList.remove('alert-success');
      }, 3000);
  } else {
      alertMsg.textContent = response;
      alertMsg.classList.add('alert-danger');
      alertMsg.classList.replace('d-none', 'd-flex');
      setTimeout(() => {
        alertMsg.classList.replace('d-flex', 'd-none');
        alertMsg.classList.remove('alert-danger');
      }, 3000);
  }
}