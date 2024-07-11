document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab-button");
  const tabContents = document.querySelectorAll(".tab-content");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const targetId = tab.getAttribute("data-tabs-target");

      tabs.forEach((t) => {
        t.classList.remove("active");
        t.classList.add("underline-custom");
      });
      tab.classList.add("active");
      tab.classList.remove("underline-custom");

      tabContents.forEach((content) => {
        content.classList.add("hidden");
      });
      document.querySelector(targetId).classList.remove("hidden");
    });
  });
});
