var map = L.map('map').setView([-7.962220456745948, 112.62999326306829], 17);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);





function onMapClick(e) {
    const modal = document.getElementById('modal')
    modal.classList.toggle('hidden');


    let latitude = e.latlng.lat.toString();
    let longitude = e.latlng.lng.toString();

}
map.on('click', onMapClick);


const modalButton = document.getElementById('modalButton');
const modal = document.getElementById('modal')

const closeModal = document.getElementById('closeModal')
closeModal.addEventListener('click', (e) => {
    modal.classList.toggle('hidden')
})
let latitude;
let longitude;

function onMapClick(e) {
    const modal = document.getElementById('modal')
    modal.classList.toggle('hidden');


    latitude = e.latlng.lat.toString();
    longitude = e.latlng.lng.toString();

}
map.on('click', onMapClick);


const formPost = document.getElementById('formPost');

formPost.addEventListener('submit', async (e) => {
    e.preventDefault();
    modal.classList.toggle('hidden')



    const formData = new FormData(e.target);
    formData.append('latitude', latitude);
    formData.append('longitude', longitude);

    try {
        const response = await fetch('post.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {


            console.log(response);

            fetchData();
        } else {
            console.log(response);
            console.error('Terjadi kesalahan saat mengirim data');
        }
    } catch (error) {
        console.error('Terjadi kesalahan:', error);
    }
});


const formUpdate = document.getElementById('formUpdate');
const modalUpdate = document.getElementById('modalUpdate');
const submitUpdate = document.getElementById('submitUpdate')
submitUpdate.addEventListener('click', (e) => {
    let nama = document.getElementsByName('newNama')[0].value;
    let deskripsi = document.getElementsByName('newDeskripsi')[0].value;
    let pulau = document.getElementsByName('newPulau')[0].value;
    let no_rmh = document.getElementsByName('newNo_rmh')[0].value;
    let alamat = document.getElementsByName('newAlamat')[0].value;

    const formData = new FormData();

    formData.append('latitude', latitude);
    formData.append('initialLatitude', initialLatitude);
    formData.append('longitude', longitude);
    formData.append('initialLongitude', initialLongitude);
    formData.append('longitude', longitude);
    formData.append('nama', nama);
    formData.append('deskripsi', deskripsi);
    formData.append('pulau', pulau);
    formData.append('no_rmh', no_rmh);
    formData.append('alamat', alamat);

    for (const [key, value] of formData.entries()) {
        console.log(`${key}: ${value}`);
    }

    fetch('update.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        console.log(data);
        fetchData();
    })
    .catch(error => {
        console.error( error);
    });

    modalUpdate.classList.add('hidden');
});
