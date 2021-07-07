window.onload = () => {
    openSearchBar();
    openPlusPanel();
};

let openSearchBar = () => {
    let openSearchBtn = document.getElementById('openSearchPanel');
    let searchPanel = document.getElementById('searchpanel');
    openSearchBtn.addEventListener('click', () => {
        searchPanel.classList.toggle('disable');
    });
};

let openPlusPanel = () => {
    let openPlusBtn = document.getElementById('openPlusBtn');
    let plusPanel = document.getElementById('plusPanel');

    openPlusBtn.addEventListener('click', () =>{
        plusPanel.classList.toggle('disable');
        document.querySelector('#openPlusBtn i.fas').classList.toggle('fa-times')
    })
}