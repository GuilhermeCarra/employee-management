// const employees = JSON.parse('<?php echo $employees ?>');

const data = JSON.parse(employees);
console.log(data);

$("#jsGrid").jsGrid({
  width: "100%",

  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  autoload: true,
  pageSize: 10,
  deleteConfirm: "Do you really want to delete this Employee?",
  controller: {
    insertItem: function (newEmployee) {
      console.log(newEmployee);
      return $.ajax({
        type: "POST",
        url: "index.php",
        dataFilter: function (response) {
          return JSON.parse(response);
        },
        data: {
          controller: "employee",
          action: "addEmployeeAjax",
          newEmployee: newEmployee,
        }
      }).done(function (response) {
        console.log(response);
      });
    },
    deleteItem: function (employee) {

      return $.ajax({
        type: "DELETE",
        url: "index.php?controller=employee&action=deleteEmployeeAjax",
        data: {
          deleteId: employee.id
        },
      }).done(function (response) {
        console.log(response);
      });
    }
  },
  rowDoubleClick: function (row) {
    window.location.href = `index.php?controller=employee&action=addEditEmployee&id=${row.item.id}`;
  },

  data: data,

  fields: [
    { name: "name", title: "Name", type: "text", width: 150, validate: "required" },
    { name: "email", title: "Email", type: "text", width: 150, validate: "required" },
    { name: "age", title: "Age", type: "number", width: 50, align: "center", validate: "required" },
    { name: "streetAddress", title: "Street Address", type: "text", width: 70, align: "center", validate: "required" },
    { name: "city", title: "City", type: "text", width: 100, align: "center", validate: "required" },
    { name: "state", title: "State", type: "text", width: 60, align: "center", validate: "required" },
    { name: "postalCode", title: "Postal Code", type: "number", align: "center", validate: "required" },
    { name: "phoneNumber", title: "Phone Number", type: "number", align: "center", validate: "required" },
    { type: "control", editButton: false }
  ]
});