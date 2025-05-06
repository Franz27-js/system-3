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
  console.log(link_name);
}

document.addEventListener('DOMContentLoaded', menu_controller());