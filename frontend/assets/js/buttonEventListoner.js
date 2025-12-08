const ButtonEventListoner = {
    addBtnPropertyInfo: function(list) {
        list.forEach(id => {
            const div = document.getElementById(id);

            div.addEventListener("click", function(event) {
                if(event.target.classList.contains("propertiesCardBtn")) {
                    const dataId = event.target.dataset.id;
                    
                    PropertiesService.propertiesIdCardDetaild(dataId);
                }
            });
        });
    },
}