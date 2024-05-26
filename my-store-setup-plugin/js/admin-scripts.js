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
