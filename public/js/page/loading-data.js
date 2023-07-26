const card_one_content = document.getElementById("card_one_content");
document.addEventListener("DOMContentLoaded", () => {
    const tab_content = document.querySelector(".tab-content");
    const grid_data_1 = document.getElementById("grid_data_1");
    const grid_data_2 = document.getElementById("grid_data_2");

    if (tab_content != null && tab_content != undefined) {
        tab_content.classList.remove("tab-content");
    }

    if ("IntersectionObserver" in window) {
        if (card_one_content != null && card_one_content != undefined) {
            card_one_content.innerHTML = make_skeleton("card", 1);
        }
        setTimeout(function () {
            load_content();
        }, 1000);

        let observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting == true) {
                    if (entry.target.id == "grid_data_1") {
                        grid_data_1.innerHTML = make_skeleton("grid", 6);
                        setTimeout(function () {
                            load_content_grid(grid_data_1, 1, 6);
                        }, 2000);
                        observer.unobserve(entry.target);
                    } else if (entry.target.id == "grid_data_2") {
                        grid_data_2.innerHTML = make_skeleton("grid", 6);

                        setTimeout(function () {
                            load_content_grid(grid_data_2, 7, 6);
                        }, 2000);
                        observer.unobserve(entry.target);
                    }
                }
            });
        });
        if (grid_data_1 != null && grid_data_1 != undefined) {
            observer.observe(grid_data_1);
        }
        if (grid_data_2 != null && grid_data_2 != undefined) {
            observer.observe(grid_data_2);
        }
    }
});

function make_skeleton(type, count) {
    var skeleton = "";
    switch (type) {
        case "card":
            for (var i = 0; i < count; i++) {
                skeleton += '<div class="ph-item">';
                skeleton += '<div class="ph-col-8">';
                skeleton += '<div class="ph-picture"></div>';
                skeleton += "</div>";
                skeleton += "<div>";
                skeleton += '<div class="ph-row">';
                skeleton += '<div class="ph-col-2 big"></div>';
                skeleton += '<div class="ph-col-10 big empty"></div>';

                skeleton += '<div class="ph-col-10 big"></div>';
                skeleton += '<div class="ph-col-2 big empty"></div>';

                skeleton += '<div class="ph-col-12 big"></div>';

                skeleton += '<div class="ph-col-12 big empty"></div>';

                skeleton += '<div class="ph-col-4 big"></div>';
                skeleton += "</div>";
                skeleton += "</div>";
                skeleton += "</div>";
            }

            break;
        case "grid":
            for (var i = 0; i < count; i++) {
                skeleton += '<div class="ph-item">';
                skeleton += '<div class="ph-col-12">';
                skeleton += '<div class="ph-picture"></div>';
                skeleton += "</div>";
                skeleton += "<div>";
                skeleton += '<div class="ph-row">';
                skeleton += '<div class="ph-col-2 big"></div>';
                skeleton += '<div class="ph-col-10 big empty"></div>';

                skeleton += '<div class="ph-col-10 big"></div>';
                skeleton += '<div class="ph-col-2 big empty"></div>';

                skeleton += '<div class="ph-col-12 big"></div>';

                skeleton += '<div class="ph-col-12 big empty"></div>';

                skeleton += '<div class="ph-col-4 big"></div>';
                skeleton += "</div>";
                skeleton += "</div>";
                skeleton += "</div>";
            }
            break;
        default:
            null;
    }
    return skeleton;
}

function load_content() {
    const tab_content = document.querySelector("#card_one_content");
    if (tab_content != null && tab_content != undefined) {
        tab_content.classList.add("tab-content");
    }
    var skip = 0;
    var take = 1;
    $.ajax({
        url: "/get-data/{skip}{take}",
        data: { skip: skip, take: take },
        method: "GET",
        success: function (data) {
            if (data != null) {
                skeleton = `
                <div class="thumb background-cover">
                <img src="/storage/post/${data[0].image}" alt="" />
                    </div>
                    <div class="content-text">
                        <div class="content">
                            <div class="content_info">
                                <span class="flag">${
                                    data[0].name_category
                                }</span>
                                <span class="time">${convertTimeAgo(
                                    Date.parse(data[0].created_at)
                                )}</span>
                            </div>
                            <div class="content_title">
                                <h2 class="title text-hide">
                                    ${data[0].name}
                                </h2>
                                <p class="content text-hide">
                                        If you've raed this far and you're wondering what "web3" is exactly,
                                        this is one of those need-to-knows, and it's pretty simple.We'll explain
                                        more below, but in short web3 is the next era of the internet in which
                                        blockchain technology will play a cental role
                                </p>
                            </div>
                            <div class="btn-readmore">
                                <a href="/blog/${data[0].slug}">Read more <span>
                                    <i class="fa-solid fa-chevron-right">
                                    </i>
                                    </span
                                ></a>
                            </div>
                        </div>
                    </div>
                `;
                $("#card_one_content").html(skeleton);
            }
        },
    });
}

function load_content_grid(elementId, skip, take) {
    $.ajax({
        url: "/get-data/{skip}{take}",
        data: { skip: skip, take: take },
        method: "GET",
        success: function (data) {
            if (data) {
                view_grid_data(elementId, data);
            }
        },
    });
}

function view_grid_data(elementId, data) {
    elementId.innerHTML = "";
    for (var i = 0; i < data.length; i++) {
        var item = `<div class="item">
                <div class="thumbnail background-cover">
                    <img src="/storage/post/${data[i].image}" alt="" />
                </div>
                <div class="item-content">
                    <div class="content_info">
                        <span class="flag">${data[i].name_category}</span>
                        <span class="time">
                        ${convertTimeAgo(Date.parse(data[i].created_at))}
                        </span>
                    </div>
                    <h2 class="title text-hide">
                        ${data[i].name}
                    </h2>
                    <h4 class="content text-hide">
                    ${data[i].title}
                    </h4>
                </div>
                <div class="btn-readmore">
                    <a href="/blog/${data[i].slug}">
                        Read more
                        <span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>`;

        elementId.innerHTML += item;
    }
}

function convertTimeAgo(date) {
    const seconds = Math.floor((new Date() - date) / 1000);

    let interval = Math.floor(seconds / 31536000);
    if (interval > 1) {
        return interval + " years ago";
    }

    interval = Math.floor(seconds / 2592000);
    if (interval > 1) {
        return interval + " months ago";
    }

    interval = Math.floor(seconds / 86400);
    if (interval > 1) {
        return interval + " days ago";
    }

    interval = Math.floor(seconds / 3600);
    if (interval > 1) {
        return interval + " hours ago";
    }

    interval = Math.floor(seconds / 60);
    if (interval > 1) {
        return interval + " minutes ago";
    }

    if (seconds < 10) return "just now";

    return Math.floor(seconds) + " seconds ago";
}
