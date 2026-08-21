// ================================================================
// FormValidator - lightweight client-side form validation
// ================================================================
// Usage:
//   <form data-validate>
//     <input data-rules="required|min:2|max:60" data-label="Name">
//     <input data-rules="required|email" data-label="Email">
//   </form>
//
// Rules: required, email, min:N, max:N, phone, in:val1,val2, checked
// ================================================================

const VALIDATORS = {
  required(value, param, field) {
    if (field.type === "checkbox") {
      var form = field.closest("form");
      var group = form ? form.querySelectorAll('[name="' + field.name + '"]') : [field];
      if (group.length > 1) return Array.from(group).some(function (c) { return c.checked; });
      return field.checked;
    }
    if (field.type === "radio") {
      var group = field.closest("form").querySelectorAll('[name="' + field.name + '"]');
      return Array.from(group).some(function (r) { return r.checked; });
    }
    if (field.type === "file") {
      return field.files && field.files.length > 0;
    }
    return typeof value === "string" && value.trim().length > 0;
  },

  email(value) {
    if (!value) return true;
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
  },

  phone(value) {
    if (!value) return true;
    var cleaned = value.replace(/[\s\-()]/g, "");
    if (/^(\+?880|0)1[3-9]\d{8}$/.test(cleaned)) return true;
    return false;
  },

  min(value, len) {
    if (!value) return true;
    return value.trim().length >= Number(len);
  },

  max(value, len) {
    if (!value) return true;
    return value.trim().length <= Number(len);
  },

  in(value, list) {
    if (!value) return true;
    var allowed = list.split(",").map(function (s) { return s.trim(); });
    return allowed.includes(value);
  },

  checked(_value, _param, field) {
    return field.checked;
  }
};

function formatMessage(rule, param, label) {
  var name = label || "This field";
  var messages = {
    required: name + " is required",
    email: "Please enter a valid email address",
    phone: "Please enter a valid Bangladeshi phone number (e.g. 01XXXXXXXXX)",
    min: name + " must be at least " + param + " characters",
    max: name + " must be at most " + param + " characters",
    in: name + " has an invalid selection",
    checked: "Please check this box"
  };
  return messages[rule] || name + " is invalid";
}

function parseRules(ruleStr) {
  if (!ruleStr) return [];
  return ruleStr.split("|").map(function (token) {
    var parts = token.split(":");
    return { rule: parts[0].trim(), param: parts.slice(1).join(":") };
  });
}

function validateField(field) {
  var ruleStr = field.dataset.rules;
  if (!ruleStr) return null;
  var label = field.dataset.label || "";
  var rules = parseRules(ruleStr);
  var value = (field.type === "checkbox" || field.type === "radio") ? "" : field.value;

  for (var i = 0; i < rules.length; i++) {
    var fn = VALIDATORS[rules[i].rule];
    if (!fn) continue;
    if (!fn(value, rules[i].param, field)) {
      return formatMessage(rules[i].rule, rules[i].param, label);
    }
  }
  return null;
}

function findWrapper(field) {
  return field.closest(".flex.flex-col.gap-2") || field.closest(".flex.flex-col.gap-3") || field.closest(".flex.flex-col") || field.parentElement;
}

function showError(field, message) {
  var wrapper = findWrapper(field);
  if (!wrapper) return;

  var errEl = wrapper.querySelector("[data-validation-error]");
  if (!errEl) {
    errEl = document.createElement("span");
    errEl.setAttribute("data-validation-error", "");
    errEl.className = "text-red-500 text-xs font-medium px-1";
    wrapper.appendChild(errEl);
  }
  errEl.textContent = message;

  if (field.type === "hidden" || field.type === "file" || field.type === "radio" || field.type === "checkbox") return;

  field.classList.add("border-red-500", "focus:ring-red-500");
  field.classList.remove(
    "border-transparent",
    "border-(--admin-border)",
    "focus:ring-accent-500",
    "focus:ring-(--admin-accent)"
  );
}

function clearError(field) {
  var wrapper = findWrapper(field);
  if (!wrapper) return;

  var errEl = wrapper.querySelector("[data-validation-error]");
  if (errEl) errEl.remove();

  if (field.type === "hidden" || field.type === "file" || field.type === "radio" || field.type === "checkbox") return;

  field.classList.remove("border-red-500", "focus:ring-red-500");
  if (field.closest(".admin-layout-root")) {
    field.classList.add("border-(--admin-border)", "focus:ring-(--admin-accent)");
  } else {
    field.classList.add("border-transparent", "focus:ring-accent-500");
  }
}

function validateGroup(field) {
  if (field.type === "radio" || field.type === "checkbox") {
    var form = field.closest("form");
    if (form) {
      var siblings = form.querySelectorAll('[name="' + field.name + '"]');
      var target = siblings[0];
      var err = validateField(target);
      if (err) showError(target, err); else clearError(target);
    }
    return;
  }
  var err = validateField(field);
  if (err) showError(field, err); else clearError(field);
}

export function validateForm(form) {
  var fields = form.querySelectorAll("[data-rules]");
  var firstInvalid = null;

  fields.forEach(function (field) {
    if (field.disabled) { clearError(field); return; }

    var err = validateField(field);
    if (err) {
      showError(field, err);
      if (!firstInvalid) firstInvalid = field;
    } else {
      clearError(field);
    }
  });

  if (firstInvalid) {
    firstInvalid.focus();
    firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
  }

  return !firstInvalid;
}

export function showServerErrors(form, errors) {
  Object.keys(errors).forEach(function (key) {
    var field = form.querySelector('[name="' + key + '"]');
    if (field) showError(field, errors[key][0]);
  });
}

export function initFormValidation() {
  document.querySelectorAll("form[data-validate]").forEach(function (form) {
    var boundGroups = {};

    form.querySelectorAll("[data-rules]").forEach(function (field) {
      field.addEventListener("blur", function () { validateGroup(field); });
      field.addEventListener("input", function () {
        var wrapper = findWrapper(field);
        var errEl = wrapper ? wrapper.querySelector("[data-validation-error]") : null;
        if (errEl) validateGroup(field);
      });
      if (field.type === "radio" || field.type === "checkbox") {
        field.addEventListener("change", function () { validateGroup(field); });
        if (!boundGroups[field.name]) {
          boundGroups[field.name] = true;
          form.querySelectorAll('[name="' + field.name + '"]').forEach(function (sibling) {
            if (sibling !== field) {
              sibling.addEventListener("change", function () { validateGroup(sibling); });
            }
          });
        }
      }
    });

    form.addEventListener("submit", function (e) {
      if (!validateForm(form)) {
        e.preventDefault();
      }
    });
  });
}

window.validateForm = validateForm;
window.showServerErrors = showServerErrors;
