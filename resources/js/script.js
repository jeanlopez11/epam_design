// Event delegation
const on = (selector, eventType, childSelector, eventHandler) => {
  const elements = document.querySelectorAll(selector);
  for (element of elements) {
    element.addEventListener(eventType, (eventOnElement) => {
      if (eventOnElement.target.closest(childSelector)) {
        eventHandler(eventOnElement);
      }
    });
  }
};

// AnimateCSS
const animateCSS = (element, animation, prefix = "animate__") => {
  return new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = element;

    node.classList.add(`${prefix}animated`, `${prefix}faster`, animationName);

    const handleAnimationEnd = (event) => {
      event.stopPropagation();
      node.classList.remove(
        `${prefix}animated`,
        `${prefix}faster`,
        animationName
      );
      resolve("Animation Ended.");
    };

    node.addEventListener("animationend", handleAnimationEnd, { once: true });
  });
};

// Open Collapse
const openCollapse = (collapse, callback) => {
  setTimeout(() => {
    collapse.style.height = collapse.scrollHeight + "px";
    collapse.style.opacity = 1;
  }, 200);

  collapse.addEventListener(
    "transitionend",
    () => {
      collapse.classList.add("open");

      collapse.style.removeProperty("height");
      collapse.style.removeProperty("opacity");

      if (typeof callback === "function") callback();
    },
    { once: true }
  );
};

// Close Collapse
const closeCollapse = (collapse, callback) => {
  collapse.style.overflowY = "hidden";
  collapse.style.height = collapse.scrollHeight + "px";

  setTimeout(() => {
    collapse.style.height = 0;
    collapse.style.opacity = 0;
  }, 200);

  collapse.addEventListener(
    "transitionend",
    () => {
      collapse.classList.remove("open");

      collapse.style.removeProperty("overflow-y");
      collapse.style.removeProperty("height");
      collapse.style.removeProperty("opacity");

      if (typeof callback === "function") callback();
    },
    { once: true }
  );
};


//VALIDACIONES PROPIAS

const valideKeyLetter = (evt) => {
  // code is the decimal ASCII representation of the pressed key.
  var code = (evt.which) ? evt.which : evt.keyCode;
  if (code == 8) { // backspace.
    return true;
  } else if (code >= 48 && code <= 57) { // is a number.
    return true;
  } else { // other keys.
    return false;
  }
}

const validateOnlyLetter = (evt) => {
  if ((evt.keyCode != 32) && (evt.keyCode < 65) || (evt.keyCode > 90) && (evt.keyCode < 97) || (evt.keyCode > 122))
    evt.returnValue = false;
}

const validateEmail = (name) => {
  // Get our input reference.
  var emailField = document.getElementById(name);

  // Define our regular expression.
  var validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

  // Using test we can check if the text match the pattern
  if (validEmail.test(emailField.value)) {
    // alert('Email is valid, continue with form submission');
    return true;
  } else {
    alert('El email tiene un formato incorrecto');
    return false;
  }
}

// onKeyUp para validar cada vez que se presiona una tecla
const valideMinLength = (evt) => {
  alert(evt);
  if (evt.value.length >= evt.maxLength) {
    alert('Formato incorrecto, verifique!');
  }
}

const valideMaxLength = (evt) => {
  if (this.value.length >= this.maxLength) {
    alert('Formato incorrecto, verifique!');
  }
}