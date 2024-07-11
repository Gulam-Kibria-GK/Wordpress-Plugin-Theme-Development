// js/admin-scripts.js
document.addEventListener("DOMContentLoaded", function () {
  var currentStep = 1;
  var steps = document.querySelectorAll(".setup-step");
  var nextButtons = document.querySelectorAll(".next-step");
  var prevButtons = document.querySelectorAll(".prev-step");

  function showStep(step) {
    steps.forEach(function (stepElement, index) {
      stepElement.style.display = index + 1 === step ? "block" : "none";
    });
  }

  nextButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      if (currentStep < steps.length) {
        currentStep++;
        showStep(currentStep);
      }
    });
  });

  prevButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
      }
    });
  });

  showStep(currentStep);
});

// JavaScript code to detect active link and change background color
const currentPage = window.location.href;
const addLink = document.querySelector('a[href="?page=product&action=add"]');
const listLink = document.querySelector('a[href="?page=product&action=list"]');

if (currentPage.includes("action=add")) {
  addLink.style.backgroundColor = "#999999";
  addLink.style.borderColor = "#999999";
} else if (currentPage.includes("action=list")) {
  listLink.style.backgroundColor = "#999999";
  listLink.style.borderColor = "#999999";
}
