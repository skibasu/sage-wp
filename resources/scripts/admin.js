// console.log('hej');
// document.addEventListener('DOMContentLoaded', function () {
//     console.log('hej');
//     // Check if wp.media is available
//     if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
//         console.error('wp.media is not available');
//         return;
//     }

//     // Handle image upload
//     const buttons = document.querySelectorAll('.upload_images_button');

//     buttons.forEach((button) => {
//         button.addEventListener('click', function (event) {
//             event.preventDefault();
//             const targetInputId = this.getAttribute('data-target');
//             const inputField = document.querySelector(targetInputId);
//             const previewContainerId =
//                 'menu-item-image-previews-' + inputField.id.split('-').pop();
//             const previewContainer =
//                 document.getElementById(previewContainerId);

//             if (!previewContainer) {
//                 console.error(
//                     `Preview container with id ${previewContainerId} not found.`
//                 );
//                 return;
//             }

//             const customUploader = wp
//                 .media({
//                     title: 'Select Images',
//                     button: {
//                         text: 'Use these images',
//                     },
//                     multiple: true,
//                 })
//                 .on('select', function () {
//                     const attachments = customUploader
//                         .state()
//                         .get('selection')
//                         .map((attachment) => attachment.toJSON());
//                     const imageUrls = attachments.map(
//                         (attachment) => attachment.url
//                     );

//                     const existingUrls = inputField.value
//                         ? JSON.parse(inputField.value)
//                         : [];
//                     const allUrls = existingUrls.concat(imageUrls);

//                     inputField.value = JSON.stringify(allUrls);
//                     previewContainer.innerHTML = ''; // Clear previous images
//                     allUrls.forEach((url) => {
//                         const imgDiv = document.createElement('div');
//                         imgDiv.classList.add('menu-item-image-preview');

//                         const img = document.createElement('img');
//                         img.src = url;
//                         img.style.maxWidth = '100px';
//                         img.style.maxHeight = '100px';

//                         const removeButton = document.createElement('button');
//                         removeButton.classList.add(
//                             'button',
//                             'remove_image_button'
//                         );

//                         removeButton.setAttribute('data-image-url', url);

//                         removeButton.addEventListener('click', function (e) {
//                             e.preventDefault();
//                             const urlToRemove =
//                                 this.getAttribute('data-image-url');
//                             const updatedUrls = JSON.parse(
//                                 inputField.value
//                             ).filter((imageUrl) => imageUrl !== urlToRemove);
//                             inputField.value = JSON.stringify(updatedUrls);
//                             this.parentElement.remove();
//                         });

//                         imgDiv.appendChild(img);
//                         imgDiv.appendChild(removeButton);
//                         previewContainer.appendChild(imgDiv);
//                     });
//                 })
//                 .open();
//         });
//     });

//     // Function to toggle custom fields based on depth and children
//     function toggleCustomFields() {
//         const menuItems = document.querySelectorAll('#menu-to-edit .menu-item');
//         menuItems.forEach((item, index) => {
//             const depth = parseInt(
//                 item.className.match(/menu-item-depth-(\d+)/)[1]
//             );
//             const hasChildren =
//                 index < menuItems.length - 1
//                     ? menuItems[index + 1].className.includes(
//                           'menu-item-depth-1'
//                       )
//                     : false;
//             const customFields = item.querySelectorAll('.field-custom');

//             if (depth > 0 || !hasChildren) {
//                 customFields.forEach((field) => {
//                     field.style.display = 'none';
//                     const imagePreview = item.querySelector(
//                         '.menu-item-image-previews'
//                     );
//                     if (imagePreview) imagePreview.style.display = 'none';
//                 });
//             } else {
//                 customFields.forEach((field) => {
//                     field.style.display = 'block';
//                     const imagePreview = item.querySelector(
//                         '.menu-item-image-previews'
//                     );
//                     if (imagePreview) imagePreview.style.display = 'flex';
//                 });
//             }
//         });
//     }

//     // Initial check
//     toggleCustomFields();

//     // Observe changes to the menu structure
//     const menuContainer = document.getElementById('menu-to-edit');
//     console.log(menuContainer);
//     const observer = new MutationObserver(() => {
//         toggleCustomFields();
//     });

//     observer.observe(menuContainer, {
//         childList: true,
//         subtree: true,
//         attributes: true,
//         attributeFilter: ['class'],
//     });

//     // Add event listeners to add/remove children events
//     document.addEventListener('click', function (event) {
//         console.log('clik');
//         if (event.target && event.target.classList.contains('item-edit')) {
//             setTimeout(toggleCustomFields, 100); // Timeout to wait for the menu item to expand
//         }
//     });
// });

document.addEventListener('DOMContentLoaded', function () {
    console.log('hej');
    // Check if wp.media is available
    if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
        console.error('wp.media is not available');
        return;
    }

    // Handle image upload
    const buttons = document.querySelectorAll('.upload_images_button');

    buttons.forEach((button) => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const targetInputId = this.getAttribute('data-target');
            const inputField = document.querySelector(targetInputId);
            const previewContainerId =
                'menu-item-image-previews-' + inputField.id.split('-').pop();
            const previewContainer =
                document.getElementById(previewContainerId);

            if (!previewContainer) {
                console.error(
                    `Preview container with id ${previewContainerId} not found.`
                );
                return;
            }
            if (!inputField) {
                console.error(
                    `Input field with id ${targetInputId} not found.`
                );
                return;
            }

            const customUploader = wp
                .media({
                    title: 'Select Images',
                    button: { text: 'Use these images' },
                    multiple: true,
                })
                .on('select', function () {
                    const attachments = customUploader
                        .state()
                        .get('selection')
                        .map((attachment) => attachment.toJSON());
                    const imageUrls = attachments.map(
                        (attachment) => attachment.url
                    );

                    const existingUrls = inputField.value
                        ? JSON.parse(inputField.value)
                        : [];
                    const allUrls = existingUrls.concat(imageUrls);

                    inputField.value = JSON.stringify(allUrls);
                    previewContainer.innerHTML = ''; // Clear previous images
                    allUrls.forEach((url) => {
                        const imgDiv = document.createElement('div');
                        imgDiv.classList.add('menu-item-image-preview');

                        const img = document.createElement('img');
                        img.src = url;
                        img.style.maxWidth = '100px';
                        img.style.maxHeight = '100px';

                        const removeButton = document.createElement('button');
                        removeButton.classList.add(
                            'button',
                            'remove_image_button'
                        );
                        removeButton.textContent = 'Remove';
                        removeButton.setAttribute('data-image-url', url);

                        removeButton.addEventListener('click', function (e) {
                            e.preventDefault();
                            const urlToRemove =
                                this.getAttribute('data-image-url');
                            const updatedUrls = JSON.parse(
                                inputField.value
                            ).filter((imageUrl) => imageUrl !== urlToRemove);
                            inputField.value = JSON.stringify(updatedUrls);
                            this.parentElement.remove();
                        });

                        imgDiv.appendChild(img);
                        imgDiv.appendChild(removeButton);
                        previewContainer.appendChild(imgDiv);
                    });
                })
                .open();
        });
    });

    // Function to toggle custom fields based on depth and children
    function toggleCustomFields() {
        const menuItems = document.querySelectorAll('.menu-edit .menu-item');
        menuItems.forEach((item, index) => {
            const depth = parseInt(
                item?.className?.match(/menu-item-depth-(\d+)/)[1]
            );
            const hasChildren =
                index < menuItems.length - 1
                    ? menuItems[index + 1].className.includes(
                          'menu-item-depth-1'
                      )
                    : false;
            const customFields = item.querySelectorAll('.field-custom');
            const customPictures = item.querySelector(
                '.menu-item-image-previews'
            );

            if (depth > 0 || !hasChildren) {
                if (customPictures) customPictures.style.display = 'none';
                customFields.forEach((field) => {
                    field.style.display = 'none';
                });
            } else {
                if (customPictures) customPictures.style.display = 'flex';
                customFields.forEach((field) => {
                    field.style.display = 'block';
                });
            }
        });
    }

    // Initial check
    toggleCustomFields();

    // Observe changes to the menu structure
    const menuContainer = document.querySelector('.menu-edit');
    if (menuContainer) {
        const observer = new MutationObserver(() => {
            toggleCustomFields();
        });

        observer.observe(menuContainer, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class'],
        });

        // Add event listener to handle drag and drop events
        document
            .querySelectorAll('.menu-edit, .menu-item')
            .forEach((element) => {
                element.addEventListener('dragstart', function () {
                    console.log('Sort started on element:', element);
                });
                element.addEventListener('dragstop', function () {
                    console.log('Sort stopped on element:', element);
                    toggleCustomFields();
                });
            });

        // Add event listeners to add/remove children events
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('item-edit')) {
                setTimeout(toggleCustomFields, 100); // Timeout to wait for the menu item to expand
            }
        });
    } else {
        console.error('.menu-edit not found.');
    }
});
