const form = document.querySelector('#employeeForm');
const id = document.querySelector('#id');
const name = document.querySelector('#nameInp');
const surname = document.querySelector('#surnameInp');
const email = document.querySelector('#emailInp');
const gender = document.querySelector('#genderInp');
const city = document.querySelector('#cityInp');
const address = document.querySelector('#addressInp');
const state = document.querySelector('#stateInp');
const age = document.querySelector('#ageInp');
const po = document.querySelector('#poInp');
const phone = document.querySelector('#phoneInp');
const alertMsg = document.querySelector('#formErrMsg');
const avatar = document.querySelector('#profileImg');
const avatarCont = document.querySelector('#profilePicCont');
const avatarSel = document.querySelector('#profilePicSelect');
const avatarInput = document.querySelector('#avatarInp');

if ($("#employeeForm")) {
   $("#dashboardTitle").toggleClass("activated innactive");
   $("#employeeTitle").toggleClass("activated innactive");
}


document.querySelector('#submitForm').addEventListener('click', e => {
   e.preventDefault();

   if (checkInputs()) {
      document.getElementById("employeeForm").submit();
   } else {
      alertMsg.textContent = 'Please, correct the highlighted errors.';
      alertMsg.classList.add('alert-danger');
      alertMsg.classList.replace('d-none', 'd-flex');
   };
});

function alertsMsg(response) {
   if (response.includes('modified') || parseInt(response) >= 0) {
      alertMsg.textContent = ((response.includes('modified')) ? 'All changes applied! ' : `New employee created (id ${response}). `) + 'Redirecting to main page...';
      alertMsg.classList.remove('alert-danger');
      alertMsg.classList.add('alert-success');
      alertMsg.classList.replace('d-none', 'd-flex');
      setTimeout(() => {
         window.location.href = path+'/employeeController/getEmployeesCont/';
         alertMsg.classList.replace('d-flex', 'd-none');
         alertMsg.classList.remove('alert-success');
      }, 3000);
   } else {
      alertMsg.textContent = 'Oops, error ' + response.status + '. Please, try again later.';
      alertMsg.classList.add('alert-danger');
      alertMsg.classList.replace('d-none', 'd-flex');
   }
}


function checkInputs() {
   let checkName = false;
   let checkSurname = false;
   let checkAge = false;
   let checkCity = false;
   let checkEmail = false;
   // let checkGender = false;
   let checkPhone = false;
   let checkPo = false;
   let checkState = false;
   let checkAddress = false;

   console.log();
   if (name.value.match(/^[ A-zÀ-ÿ-]+$/gm)) {
      checkName = true;
      name.classList.remove('form-error');
   } else {
      name.classList.add('form-error');
   }
   if (surname.value.match(/^[ A-zÀ-ÿ-]+$/gm)) {
      checkSurname = true;
      surname.classList.remove('form-error');
   } else {
      surname.classList.add('form-error');
   }
   if (age.value.match(/^[0-9]+$/gm)) {
      checkAge = true;
      age.classList.remove('form-error');
   } else {
      age.classList.add('form-error');
   }
   if (city.value.match(/^[ A-zÀ-ÿ-]+$/gm)) {
      checkCity = true;
      city.classList.remove('form-error');
   } else {
      city.classList.add('form-error');
   }
   if (email.value.match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/gm)) {
      checkEmail = true;
      email.classList.remove('form-error');
   } else {
      email.classList.add('form-error');
   }
   if (address.value.match(/^\s*\S+(?:\s+\S+)/gm)) {
      checkAddress = true;
      address.classList.remove('form-error');
   } else {
      address.classList.add('form-error');
   }
   if (phone.value.match(/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/gm)) {
      checkPhone = true;
      phone.classList.remove('form-error');
   } else {
      phone.classList.add('form-error');
   }
   if (po.value.match(/^[0-9]+$/gm)) {
      checkPo = true;
      po.classList.remove('form-error');
   } else {
      po.classList.add('form-error');
   }
   if (state.value.match(/^[ A-zÀ-ÿ-]+$/gm)) {
      checkState = true;
      state.classList.remove('form-error');
   } else {
      state.classList.add('form-error');
   }

   if (checkName && checkAddress && checkSurname && checkAge && checkCity && checkEmail && checkPhone && checkPo && checkState) {
      return true;
   } else {
      return false;
   }
}

$('#profilePicCont').click(function () {
   printProfilePics();
});

function printProfilePics() {
   avatar.src = '../../assets/img/loading.gif';
   let limit = (avatar.src !== 'https://image.flaticon.com/icons/svg/753/753345.svg') ? '4' : '5';
   let genderVal = (gender.value === 'man') ? 'male' : 'female';

   if (gender.value && age.value) {
      let request = new FormData();
      request.url = `https://uifaces.co/api?limit=${limit}&gender[]=${genderVal}&to_age=${age.value}&from_age=${age.value}`;

      axios({
         method: 'POST',
         url: '../../avatarController/avatar',
         data: {
            request
         },
      }).then(response => {
         avatarCont.classList.add('d-none');
         avatar.src = '../../assets/img/usuario.svg';
         showPicOptions(response.data);
      });

   } else {
      alertMsg.textContent = 'Please, define age and gender.';
      alertMsg.classList.add('alert-danger');
      alertMsg.classList.replace('d-none', 'd-flex');
      setTimeout(() => {
         alertMsg.classList.remove('alert-danger');
         alertMsg.classList.replace('d-flex', 'd-none');
      }, 3000);
   }
}

function showPicOptions(images) {

   avatarSel.innerHTML = '';

   if (avatar.src !== 'https://image.flaticon.com/icons/svg/753/753345.svg') {
      let div = document.createElement('div');
      div.className = 'img-container';
      div.innerHTML = `<img src="${avatar.src}" alt="profile picture" id="imgSel5" class="imgSelect imgSelect--prev thumbnail">`;
      avatarSel.append(div);
   }
   images.forEach((e, i) => {
      let div = document.createElement('div');
      div.className = 'img-container';
      div.innerHTML = `<img src="${e}" alt="profile picture" id="imgSel${i}" class="imgSelect thumbnail">`;
      avatarSel.append(div);
   });

   $('.imgSelect').on('click', (e) => {
      chooseImg(e.target.src);
   });

   avatarCont.classList.replace('d-flex', 'd-none');
   avatarSel.classList.replace('d-none', 'd-flex');
   resizeAvatars();
}

function chooseImg(src) {
   avatar.src = src;
   avatarInput.value = src;
   avatar.classList.remove('d-none');
   avatarSel.classList.replace('d-flex', 'd-none');
   avatarCont.classList.remove('d-none');
}

function resizeAvatars() {
   $('.thumbnail').each(function(){
      if(this.complete) {
         if($(this).width() > $(this).height()) {
            $(this).addClass('resize-avatar');
         }
      }
      $(this).on("load",function() {
         if($(this).width() > $(this).height()) {
            $(this).addClass('resize-avatar');
         }
      });
   });
}

resizeAvatars();
$("#employeeNav").addClass("nav-active");

