function themes_controller() {
  let themes_options = [
    'dark_theme_1',
    'dark_theme_2',
  ];

  fill_theme_dropdown(themes_options);
  set_theme_listener();
}

function fill_theme_dropdown(themes_options) {
  let themes_dropdown = document.getElementById('themes_select');

  console.log(themes_dropdown);

  themes_options.forEach((theme) => {
    let option = document.createElement('option');

    option.value = theme;
    option.textContent = theme.replace(/_/g, ' ');
    themes_dropdown.appendChild(option);
  });
}

function set_theme_listener() {
  let themes_dropdown = document.getElementById('themes_select');

  themes_dropdown.addEventListener('change', (event) => {
    let selected_theme = event.target.value;

    set_theme(selected_theme);
  });
}

function set_theme(theme) {
  let global_themes_container = document.querySelector('.main_container');

  // Remove old theme classes
  global_themes_container.classList.remove('dark_theme_1', 'dark_theme_2');

  // Add new theme class
  global_themes_container.classList.add(theme);
}

// document.addEventListener('DOMContentLoaded', themes_controller());