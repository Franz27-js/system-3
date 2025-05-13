function menu_controller() {
  set_menu_events();
}

function set_menu_events() {
  let menu_links = document.querySelectorAll('.menu_link');

  menu_links.forEach(link => {
    link.addEventListener('click', menu_click);
  });
}

function menu_click() {
  let link = this;
  let link_name = link.innerText;
  let menu_links = document.querySelectorAll('.menu_link');

  menu_links.forEach(link => {
    link.classList.remove('menu_link_active');
  });

  link.classList.add('menu_link_active');
  document.querySelector('.menu_title').innerText = link_name;
}

document.addEventListener('DOMContentLoaded', menu_controller());