const toggleSidebarMobile = document.getElementById('toggleSidebarMobile');
const sidevar = document.getElementById('sidevar');
let isClose = true;


toggleSidebarMobile.addEventListener('click', () => {
    isClose = !isClose;
    if (isClose) {
        document.getElementById('toggleSidebarMobileHamburger').classList.remove('hidden');
        document.getElementById('toggleSidebarMobileClose').classList.add('hidden');
    } else {
        document.getElementById('toggleSidebarMobileHamburger').classList.add('hidden');
        document.getElementById('toggleSidebarMobileClose').classList.remove('hidden');
    }
    sidevar.classList.toggle('-translate-x-[300px]');
    sidevar.classList.toggle('translate-x-0');
})


function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section.classList.contains('hidden')) {
        section.classList.remove('hidden');
    } else {
        section.classList.add('hidden');
    }
}