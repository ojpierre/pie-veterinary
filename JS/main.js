/*----------SHOW MENU-------------*/
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/* menu show */
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

/* menu hidden */
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}
/*----------REMOVE MENU MOBILE-------------*/
const navLink = document.querySelectorAll(".nav__link");

const linkAction = () => {
  const navMenu = document.getElementById("nav-menu");
  navMenu.classList.remove("show-menu");
};
navLink.forEach((n) => n.addEventListener("click", linkAction));

/*----------CHANGE BACKGROUND HEADER-------------*/
const scrollHeader = () => {
  const header = document.getElementById("header");
  this.scrollY >= 50
    ? header.classList.add("bg-header")
    : header.classList.remove("bg-header");
};
window.addEventListener("scroll", scrollHeader);

/*----------SHOW SCROLL UP-------------*/
const scrollUp = () => {
  const scrollUp = document.getElementById("scroll-up");
  // When the scroll is higher than 350 viewport height, add the show-scroll class to the a tag with the scrollup class
  this.scrollY >= 350
    ? scrollUp.classList.add("show-scroll")
    : scrollUp.classList.remove("show-scroll");
};
window.addEventListener("scroll", scrollUp);

/*----------SCROLL REVEAL ANIMATION-------------*/
const sr = ScrollReveal({
  origin: "top",
  distance: "60px",
  duration: 2500,
  delay: 400,
});

sr.reveal(".home__data, .footer__container, .footer__groupc");
sr.reveal(".home__img", { delay: 700, origin: "bottom" });
sr.reveal(".logos__img, .program__card, .pricing__card", { interval: 100 });
sr.reveal(".choose__img, .calculate__content", { origin: "left" });
sr.reveal(".choose__content, .calculate__img", { origin: "right" });

/*--------------------------EMAIL JS------------------------*/
const contactForm = document.getElementById("contact-form"),
  contactMessage = document.getElementById("contact-message"),
  contactUser = document.getElementById("contact-user");

const sendEmail = (e) => {
  e.preventDefault();

  //check if the field has a value
  if (contactUser.value === "") {
    //add and remove color
    contactMessage.classList.remove("color-green");
    contactMessage.classList.add("color-red");

    //show message
    contactMessage.textContent = "You Must Enter Your Email";

    //remove message three seconds
    setTimeout(() => {
      contactMessage.textContent = "";
    }, 3000);
  } else {
    //service ID - templateID - #form - publicKey
    emailjs
      .sendForm(
        "service_ib74yub",
        "template_1rt4gnr",
        "#contact-form",
        "gh9-_MC1G-yJ4PSiz"
      )
      .then(
        () => {
          //show message and add color
          contactMessage.classList.add("color-green");
          contactMessage.textContent = "You Registered Successfully";

          //remove message after three seconds
          setTimeout(() => {
            contactMessage.textContent = "";
          }, 3000);
        },
        (error) => {
          //mail sending error
          alert("Oops! Something Went Wrong...", error);
        }
      );

    // To clear input field
    contactUser.value = "";
  }
};

contactForm.addEventListener("submit", sendEmail);

// Search
