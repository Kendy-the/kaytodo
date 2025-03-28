import './bootstrap';
/*------DASHBOARD-USER---------*/

const showNavbar = (toggleId, navId, bodyId, headerId) => {
  const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

  // Validate that all variables exist
  if (toggle && nav && bodypd && headerpd) {
    toggle.addEventListener('click', () => {
      // show navbar
      nav.classList.toggle('show')
      // add padding to body
      bodypd.classList.toggle('body-pd')
      // add padding to header
      headerpd.classList.toggle('body-pd')
    })
  }
}
showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

// scroll task page
document.addEventListener("DOMContentLoaded", function () {
    if(window.location.pathname != '/task'){
      setTimeout(() => {
        const section = document.getElementById("task");
        if (section) {
            section.scrollIntoView({ behavior: "smooth" });
        }
    }, 300);
  }
});

// url precedente
window.addEventListener("beforeunload", function () {
  localStorage.setItem("previousPage", window.location.href);
});

const previousURL = localStorage.getItem("previousPage");
if (previousURL) {
  document.getElementById("previous-url").setAttribute("href", previousURL);
}

// Popup
const pinInputs = document.querySelectorAll('.pin-input');
if (pinInputs) {
  pinInputs.forEach((input, index) => {
    input.addEventListener('input', (e) => {
      if (e.target.value.length === 1 && index < pinInputs.length - 1) {
        pinInputs[index + 1].focus();
      }
    });

    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && !e.target.value && index > 0) {
        pinInputs[index - 1].focus();
      }
    });
  });
}

/* TACHE - AFFICHAGE */
// function toogleView(button, forms) {
//   button.forEach((btn) => {
//     btn.addEventListener("click", function () {
//       forms.forEach((form) => {
//         form.classList.toggle('hidden')
//         formBtnMed.forEach((formBtn) => {
//           if (btn == formBtn) {

//             tgTask.classList.toggle('flex')
//             tgTask.classList.toggle('hidden')

//             togglePointerEvents(objectBtn.item(0))
//             togglePointerEvents(editBtn.item(0))
//             togglePointerEvents(endBtn.item(0))
//             togglePointerEvents(deleteBtn.item(0))

//           }
//         });
//       })
//     })
//   })
// }

// function editToggleView(button, form) {
//   button.forEach((btn) => {
//     btn.addEventListener("click", function () {
//       form.classList.toggle('hidden')
//       //desactive / active task btn view si edit
//       togglePointerEvents(objectBtn.item(0))
//       togglePointerEvents(endBtn.item(0))
//       togglePointerEvents(deleteBtn.item(0))
//     })
//   })
// }

// function endToggleView(button, form) {
//   button.forEach((btn) => {
//     btn.addEventListener("click", function () {
//       form.classList.toggle('hidden')
//       //desactive / active task btn view si edit
//       togglePointerEvents(objectBtn.item(0))
//       togglePointerEvents(editBtn.item(0))
//       togglePointerEvents(deleteBtn.item(0))
//     })
//   })
// }

// function deleteToggleView(button, form) {
//   button.forEach((btn) => {
//     btn.addEventListener("click", function () {
//       form.classList.toggle('hidden')
//       //desactive / active task btn view si edit
//       togglePointerEvents(objectBtn.item(0))
//       togglePointerEvents(endBtn.item(0))
//       togglePointerEvents(editBtn.item(0))
//     })
//   })
// }

// function togglePointerEvents(element) {
//   if (!element) {
//     console.error("L'élément passé en paramètre est invalide.");
//     return false;
//   }

//   // Vérifier l'état actuel de pointer-events
//   if (window.getComputedStyle(element).pointerEvents === "none") {
//     element.style.pointerEvents = "auto"; // Activer les événements
//   } else {
//     element.style.pointerEvents = "none"; // Désactiver les événements
//   }

// }

// //form top
// const formBtnTop = document.querySelectorAll('.new-form-t');
// const newFormTop = document.querySelectorAll('.form-t');
// if (newFormTop) {
//   toogleView(formBtnTop, newFormTop);
// }

// //form medium
// const formBtnMed = document.querySelectorAll('.new-form-m');
// const newFormMed = document.querySelectorAll('.form-m');
// const tgTask = document.querySelector('.tg-task');
// if (newFormMed) {
//   toogleView(formBtnMed, newFormMed);
// }

// //form bottom
// const formBtnBtn = document.querySelectorAll('.new-form-b');
// const newFormBtn = document.querySelectorAll('.form-b');
// if (newFormBtn) {
//   toogleView(formBtnBtn, newFormBtn);
// }

// //display
// const objectBtn = document.querySelectorAll('.object-btn');
// const objectView = document.querySelectorAll('.object-view');
// if (objectBtn) {
//   toogleView(objectBtn, objectView);
// }

// //edit display
// const editBtn = document.querySelectorAll('.edit-btn');
// const editView = document.querySelector('.edit-view');
// if (editBtn) {
//   editToggleView(editBtn, editView)
// }

// //end display
// const endBtn = document.querySelectorAll('.end-btn');
// const endView = document.querySelector('.end-view');
// if (endBtn) {
//   endToggleView(endBtn, endView)
// }

// //delete display
// const deleteBtn = document.querySelectorAll('.delete-btn');
// const deleteView = document.querySelector('.delete-view');
// if (deleteBtn) {
//   deleteToggleView(deleteBtn, deleteView)
// }