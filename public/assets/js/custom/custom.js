////////////////////////////////////////////////////////////////////////////////////////////////////

$('.view-btn').each(function () {
    let container = $(this);
    let id = container.data('id');

    // User View Modal
    $('#user_view_' + id).on('click', function () {
        $('#user_view_business_category').text($('#user_view_' + id).data('business_category'));
        $('#user_view_business_name').text($('#user_view_' + id).data('business_name'));

        let imageSrc = $('#user_view_' + id).data('image');
        $('#user_view_image').attr('src', imageSrc);
        $('#user_view_name').text($('#user_view_' + id).data('name'));
        $('#user_view_role').text($('#user_view_' + id).data('role'));
        $('#user_view_email').text($('#user_view_' + id).data('email'));
        $('#user_view_phone').text($('#user_view_' + id).data('phone'));
        $('#user_view_address').text($('#user_view_' + id).data('address'));
        $('#user_view_country_id').text($('#user_view_' + id).data('country_id'));
        $('#user_view_statfeatures-listus').text($('#user_view_' + id).data('status') == 1 ? 'Active' : 'Deactive');
    });

    // Plan View Modal
    $('#plan_view_' + id).on('click', function () {
        let features = $('#plan_view_' + id).data('features');
        let featuresList = $('#features-list');

        featuresList.empty();

        features.forEach(feature => {
            let featureHtml = `
                <div class="row align-items-center mt-3 feature-entry">
                    <div class="col-md-1">
                        <p id="plan_view_features_yes">
                            ${feature.value == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'}
                        </p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-md-7">
                        <p id="plan_view_features_name">${feature.name}</p>
                    </div>
                </div>
            `;

            featuresList.append(featureHtml);
        });
    });

    // Category View
    $('#category_view_' + id).on('click', function () {
        $('#category_view_name').text($('#category_view_' + id).data('name'));
        $('#category_view_description').text($('#category_view_' + id).data('description'));
        $('#category_view_status').text($('#category_view_' + id).data('status') == 1 ? 'Active' : 'Deactive');
    });
    // Faqs view
    $('#faqs_view_' + id).on('click', function () {
        $('#faqs_view_question').text($('#faqs_view_' + id).data('question'));
        $('#faqs_view_answer').text($('#faqs_view_' + id).data('answer'));
        $('#faqs_view_status').text($('#faqs_view_' + id).data('status') == 1 ? 'Active' : 'Deactive');
    });

});

//Business view modal
$('.business-view').on('click', function () {
    $('.business_name').text($(this).data('name'));
    $('#image').attr('src', $(this).data('image'));
    $('#name').text($(this).data('name'));
    $('#address').text($(this).data('address'));
    $('#category').text($(this).data('category'));
    $('#phone').text($(this).data('phone'));
    $('#package').text($(this).data('package'));
    $('#last_enroll').text($(this).data('last_enroll'));
    $('#expired_date').text($(this).data('expired_date'));
    $('#created_date').text($(this).data('created_date'));
});

$('#plan_id').on('change', function () {
    $('.plan-price').val($(this).find(':selected').data('price'))
});

$(document).on('change', '.file-input-change', function () {
    let prevId = $(this).data('id');
    newPreviewImage(this, prevId);
});

// image preview
function newPreviewImage(input, prevId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + prevId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//Upgrade plan
$('.business-upgrade-plan').on('click', function () {
    var url = $(this).data('url');

    $('#business_name').val($(this).data('name'));
    $('#business_id').val($(this).data('id'));
    $('.upgradePlan').attr('action', url);
});

$('.modal-reject').on('click', function () {
    var url = $(this).data('url');
    $('.modalRejectForm').attr('action', url);
});

$('.modal-approve').on('click', function () {
    var url = $(this).data('url');
    $('.modalApproveForm').attr('action', url);
});


//edit banner
$('.edit-btn').each(function () {
    let container = $(this);
    let service = container.data('id');
    let id = service;
    $('#edit-banner-' + service).on('click', function () {

        $('#checkbox').prop('checked', $('#edit-banner-' + service).data('status') == 1);
        $('.dynamic-text').text($('#edit-banner-' + service).data('status') == 1 ? 'Active' : 'Deactive');

        let edit_action_route = $(this).data('url');
        $('#editForm').attr('action', edit_action_route + '/' + id);
    });

});

$('.edit-banner-btn').on('click', function () {
    let status = $(this).data('status');
    $('.edit-status').prop('checked', status);
    $('.edit-imageUrl-form').attr('action', $(this).data('url'));
    $('#edit-imageUrl').attr('src', $(this).data('image'));

    if (status == 1) {
        $('.dynamic-text').text('Active');
    } else {
        $('.dynamic-text').text('Deactive');
    }
});

$(function () {
    $("body").on("click", ".remove-one", function () {
        $(this).closest(".remove-list").remove();
    });
});
/** Subscriptions Plan end */

//Dynamic Tags Setting Start

$(document).off('click', '.add-new-tag').on('click', '.add-new-tag', function () {
    let html = `
    <div class="col-md-6">
        <div class="row row-items">
            <div class="col-sm-10">
                <label for="">Tags</label>
                <input type="text" name="tags[]" class="form-control" required
                    placeholder="Enter tags name">
            </div>
            <div class="col-sm-2 align-self-center mt-3">
                <button type="button" class="btn text-danger trash remove-btn-features"
                    onclick="removeDynamicField(this)"><i
                        class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
    `;
    $(".manual-rows .single-tags").append(html);
});
//Dynamic tag ends

$(document).on('click', ".add-new-item", function () {
    let html = `
    <div class="row row-items">
        <div class="col-sm-5">
            <label for="">Label</label>
            <input type="text" name="manual_data[label][]" value="" class="form-control" placeholder="Enter label name">
        </div>
        <div class="col-sm-5">
            <label for="">Select Required/Optionl</label>
            <select class="form-control" required name="manual_data[is_required][]">
                <option value="1">Required</option>
                <option value="0">Optional</option>
            </select>
        </div>
        <div class="col-sm-2 align-self-center mt-3">
            <button type="button" class="btn text-danger trash remove-btn-features"><i class="fas fa-trash"></i></button>
        </div>
    </div>
    `
    $(".manual-rows").append(html);
});

$(document).on('click', ".remove-btn-features", function () {
    var $row = $(this).closest(".row-items");
    $row.remove();
});


// Staff view Start
$('.staff-view-btn').on('click', function () {
    var staffName = $(this).data('staff-view-name');
    var staffPhone = $(this).data('staff-view-phone-number');
    var staffemail = $(this).data('staff-view-email-number');
    var staffRole = $(this).data('staff-view-role');

    $('#staff_view_name').text(staffName);
    $('#staff_view_phone_number').text(staffPhone);
    $('#staff_view_email_number').text(staffemail);
    $('#staff_view_role').text(staffRole);
});
// Staff view End


var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})



// subscription-plan-edit-custom-input size
const inputs = document.querySelectorAll('.subscription-plan-edit-custom-input');

function resizeInput() {
    const tempSpan = document.createElement('span');
    tempSpan.style.visibility = 'hidden';
    tempSpan.style.position = 'absolute';
    tempSpan.style.whiteSpace = 'pre';
    tempSpan.style.font = window.getComputedStyle(this).font;
    tempSpan.textContent = this.value || this.placeholder;

    document.body.appendChild(tempSpan);

    this.style.width = (tempSpan.offsetWidth + 20) + 'px'; // 20 mean by, left + right = 20px. please check css

    document.body.removeChild(tempSpan);
}

inputs.forEach(function (input) {
    input.addEventListener('input', resizeInput);
    resizeInput.call(input);
});

// New Js Start Here

//News Category Edit Start
$('.edit-category-btn').on('click', function () {
    var route = $(this).data('url');
    var name = $(this).data('name');
    var slugTitle = $(this).data('slug-title');
    var type = $(this).data('type');
    var images = $(this).data('images');


    $('#name').val(name);
    $('#slugTitle').val(slugTitle);
    $('#type').val(type);
    $('#images').attr('src', images);
    $('#editCategoryForm').attr('action', route);
});
//News Category Edit End


//News SubCategory Edit Start
$('.edit-subcategory-btn').on('click', function () {
    var route = $(this).data('url');
    var name = $(this).data('name');
    var category_id = $(this).data('category-id');

    $('#name').val(name);
    $('#category_id').val(category_id);
    $('#editSubCategoryForm').attr('action', route);
});
//News SubCategory Edit End

//News Speciality Edit Start
$('.edit-speciality-btn').on('click', function () {
    var route = $(this).data('url');
    var name = $(this).data('name');
    var category_id = $(this).data('category-id');

    $('#name').val(name);
    $('#category_id').val(category_id);
    $('#editSpecialityForm').attr('action', route);
});
//News Speciality Edit End

//Photo gallery start
$('.photo-edit-btn').on('click', function () {
    var url = $(this).data('url');
    var title = $(this).data('title');
    var status = $(this).data('status');
    var description = $(this).data('description');
    var photoImage = $(this).data('image');


    $('#title').val(title);
    $('#status').val(status);
    $('#description').val(description);
    $('#photoImage').attr('src', photoImage);
    $('#updatePhotoForm').attr('action', url);
});

//photo Gallery End

//Blog Category  start
$('.blog-category-edit-btn').on('click', function () {
    var url = $(this).data('url');
    var blogCategoryName = $(this).data('blog-category-name');

    $('#blogCategoryName').val(blogCategoryName);
    $('#updateBlogCategoryForm').attr('action', url);
});
//Blog Category  End

//Blog SubCategory Edit Start
$('.edit-blog-subcategory-btn').on('click', function () {
    var route = $(this).data('url');
    var blogSubCategoryname = $(this).data('blog-sub-category-name');
    var blogSubCategory_id = $(this).data('blog-sub-category-id');

    $('#blogSubCategoryname').val(blogSubCategoryname);
    $('#blogSubCategory_id').val(blogSubCategory_id);
    $('#editBlogSubCategoryForm').attr('action', route);
});
//Blog SubCategory Edit End

// Company Edit Start
$('.edit-company-btn').on('click', function () {
    var route = $(this).data('url');
    var companyName = $(this).data('company-name');
    var companyAddressLine1 = $(this).data('company-address-line1');
    var companyAddressLine2 = $(this).data('company-address-line2');
    var companyPhone = $(this).data('company-phone');
    var companyEmail = $(this).data('company-email');
    var companyLocationMap = $(this).data('company-location_map');
    var companyMessage = $(this).data('company-message');
    var companyCopyright = $(this).data('company-copyright');
    var companyVersion = $(this).data('company-version');

    // Assuming you have form fields with IDs matching these
    $('#companyName').val(companyName);
    $('#companyAddressLine1').val(companyAddressLine1);
    $('#companyAddressLine2').val(companyAddressLine2);
    $('#companyPhone').val(companyPhone);
    $('#companyEmail').val(companyEmail);
    $('#companyLocationMap').val(companyLocationMap);
    $('#companyMessage').val(companyMessage);
    $('#companyCopyright').val(companyCopyright);
    $('#companyVersion').val(companyVersion);

    // Update form action
    $('#editCompanyForm').attr('action', route);
});

//Company Edit End


// Social Share Edit Start
$('.edit-social-share-btn').on('click', function () {
    var route = $(this).data('url');
    var companyName = $(this).data('company-name');
    var socialUrl = $(this).data('social-url');
    var iconCode = $(this).data('icon-code');
    var follower = $(this).data('social-follower');

    // Set the values in the form fields
    $('#companyName').val(companyName);
    $('#socialUrl').val(socialUrl);
    $('#iconCode').val(iconCode);
    $('#followerCount').val(follower);

    // Update form action
    $('#editSocialShareForm').attr('action', route);
});

//Social Share Edit End

// Theme Edit start Here
$('.edit-theme-btn').on('click', function () {
    var url = $(this).data('url');
    var themeTitle = $(this).data('title');
    var themeAuthor = $(this).data('author');
    var themeDescription = $(this).data('description');
    var themePage = $(this).data('page');
    var themeVersion = $(this).data('version');
    var themeImage = $(this).data('theme-image');

    $('#themeTitle').val(themeTitle);
    $('#themeAuthor').val(themeAuthor);
    $('#themeDescription').val(themeDescription);
    $('#themePage').val(themePage);
    $('#themeVersion').val(themeVersion);
    $('#themeImage').attr('src', themeImage);
    $('#updateThemeForm').attr('action', url);
});

// Theme End Here

//Ads Edit Start
$('.edit-ads-btn').on('click', function () {
    var route = $(this).data('url');
    var headerAds = $(this).data('header-ads');
    var sidebarAds = $(this).data('sidebar-ads');
    var beforePostAds = $(this).data('before-post-ads');
    var afterPostAds = $(this).data('after-post-ads');

    $('#headerAds').val(headerAds);
    $('#sidebarAds').val(sidebarAds);
    $('#beforePostAds').val(beforePostAds);
    $('#afterPostAds').val(afterPostAds);
    $('#editAdsForm').attr('action', route);
});
//Ads Edit End

// Seo Edit Start
$('.edit-seo-btn').on('click', function () {
    var route = $(this).data('url');
    var keyword = $(this).data('seo-keyword');
    var authorName = $(this).data('seo-author-name');
    var metaTitle = $(this).data('seo-meta-title');
    var metaDescription = $(this).data('seo-meta-description');
    var googleAnalytics = $(this).data('seo-google-analytics');

    $('#keyword').val(keyword);
    $('#authorName').val(authorName);
    $('#metaTitle').val(metaTitle);
    $('#metaDescription').val(metaDescription);
    $('#googleAnalytics').val(googleAnalytics);

    $('#editSeoForm').attr('action', route);
});

//Header Code Edit Start
$('.edit-header-code-btn').on('click', function () {
    var route = $(this).data('url');
    var googleAnalytics = $(this).data('google-analytics-text');
    console.log(googleAnalytics)

    $('#googleAnalytics').val(googleAnalytics);
    $('#editHeaderForm').attr('action', route);
});
//Header Code Edit End

//Icon start
$('.edit-item-icon').on('click', function () {
    var url = $(this).data('url');
    var favicon = $(this).data('favicon');
    var iconEdit = $(this).data('icon-update');
    var frontend_logo = $(this).data('frontend-logo');

    $('#edit_favicon').attr('src', favicon);
    $('#update_icon').attr('src', iconEdit);
    $('#edit_frontend_logo').attr('src', frontend_logo);

    // Update the form action URL
    $('#updateIcon').attr('action', url);
});

//Icon End

//Logo start
$('.edit-item-logo').on('click', function () {
    var url = $(this).data('url');
    var logo = $(this).data('logo-update');
    var logoFooter = $(this).data('logo-footer-update');

    $('#edit_setting_logo').attr('src', logo);
    $('#edit_setting_logo_footer').attr('src', logoFooter);

    $('#updateLogo').attr('action', url);
});

//Logo End


$('.user-statistics').on('change', function () {
    let year = $(this).val();
    getYearlyStatistics(year)
})

// Function to convert month index to month name
function getMonthNameFromIndex(index) {
    var months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    return months[index - 1];
}

function getYearlyStatistics(year = new Date().getFullYear()) {
    var url = $('#yearly-statistics-url').val();
    $.ajax({
        type: "GET",
        url: url += '?year=' + year,
        dataType: "json",
        success: function (res) {
            var users = res.users;
            var subscriber = res.subscriber;
            var userData = [];
            var subscriberData = [];

            for (var i = 0; i <= 11; i++) {
                var monthName = getMonthNameFromIndex(i); // Implement this function to get month name

                var userEntry = users.find(item => item.month === monthName);
                userData[i] = userEntry ? userEntry.total : 0;

                var subscriberEntry = subscriber.find(item => item.month === monthName);
                subscriberData[i] = subscriberEntry ? subscriberEntry.total : 0;
            }
            totalUserChart(userData, subscriberData)
        },
    });
}

let statiSticsValu = false;

function totalUserChart(userData, subscriberData) {
    if (statiSticsValu) {
        statiSticsValu.destroy();
    }

    var ctx = document.getElementById('monthly-statistics').getContext('2d');

    statiSticsValu = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Free User:'+ userData.reduce((prevVal, currentVal) => prevVal + currentVal, 0),
                    borderColor: '#54D1FF',
                    backgroundColor: '#0F77EB',
                    borderRadius: 20,
                    barThickness:10,
                    fill: true,
                    tension: 0.4,
                    data: userData,
                },
                {
                    label: 'Subscribed:'+ subscriberData.reduce((prevVal, currentVal) => prevVal + currentVal, 0),
                    borderColor: '#FD7F0B',
                    backgroundColor: '#FFB46F',
                    borderRadius: 20,
                    barThickness:10,
                    fill: true,
                    tension: 0.4,
                    data: subscriberData,
                }
            ]
        },

        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true
                    }
                }
            },

            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    min: 0,
                    display: true,
                    title: {
                        display: true,

                    },
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);
                        }
                    }
                }
            }
        }
    });
};




// $('.category-statistics').on('change', function () {
//     getCategoryStatistics()
// })

function getCategoryStatistics() {
    var url = $('#category-statistics-url').val();
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (res) {
            var categories = res.categories;
            var categoryLabels = [];
            var categoryData = [];

            categories.forEach(category => {
                categoryLabels.push(category.name);
                categoryData.push(category.total);
            });

            renderDoughnutChart(categoryLabels, categoryData);
        },
    });
}

let statiSticsValue = false;

function renderDoughnutChart(categoryLabels, categoryData) {
    if (statiSticsValue) {
        statiSticsValue.destroy();
    }

    var ctx = document.getElementById('category-statistics').getContext('2d');
     statiSticsValue = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Category Wise News',
                data: categoryData,
                backgroundColor: [
                    '#36A2EB', // Blue - Business
                    '#8A2BE2', // Purple - Politics
                    '#3CB371', // Green - Health
                    '#FF6347', // Red - Sports
                    '#FFD700', // Yellow - Travels
                    '#4682B4', // SteelBlue - Family's
                    '#87CEEB', // SkyBlue - Science
                    '#FF69B4', // HotPink - Technology
                    '#FF8C00', // Orange - Religion
                    '#00FA9A'  // MediumSpringGreen - Others (If needed)
                ],
                borderColor: '#FFFFFF', // White border for a clean look
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        color: '#000000', // Black labels
                        font: {
                            size: 14 // Adjust font size for readability
                        },
                        padding: 20
                    }
                }
            }
        }
    });
}

