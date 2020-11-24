var mascota_id = localStorage.getItem("Mascota");
window.onload = function () {
    var chart = new OrgChart(document.getElementById("tree"), {

        mouseScrool: OrgChart.action.none,
        template: "olivia",
        enableDragDrop: true,



        menu: {
            pdf: { text: "Export PDF" },
            png: { text: "Export PNG" },
            svg: { text: "Export SVG" },
            csv: { text: "Export CSV" }
        },
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img",
        },
        nodes: [
            { id: 1, name: localStorage.getItem("NombreMascota"), title: localStorage.getItem("Animal")+" : "+localStorage.getItem("Raza"), img: "http://localhost:8000/images/"+localStorage.getItem("Imagen")+"" , data:"esta es informacion"},

            { id: 2, pid: 1, name: "Billie Rose", title: "Dev Team Lead", img: "https://cdn.balkan.app/shared/5.jpg" },
            { id: 3, pid: 1, name: "Glenn Bell", title: "HR", img: "https://cdn.balkan.app/shared/10.jpg" },


            { id: 4, pid: 2, name: "Skye Terrell", title: "Manager", img: "https://cdn.balkan.app/shared/12.jpg" , data:"esta es informacion"},
            { id: 5, pid: 2, name: "Skye Terrell", title: "Manager", img: "https://cdn.balkan.app/shared/12.jpg" },

            { id: 6, pid: 3, name: "Jordan Harris", title: "JS Developer", img: "https://cdn.balkan.app/shared/6.jpg" },
            { id: 7, pid: 3, name: "Will Woods", title: "JS Developer", img: "https://cdn.balkan.app/shared/7.jpg" },

        ]
    });

};
