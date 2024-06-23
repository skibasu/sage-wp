document.addEventListener('DOMContentLoaded', function () {
    const menuContainer = document.querySelector('.menu-edit');
    console.log('Start admin');

    if (
        typeof wp === 'undefined' ||
        typeof wp.media === 'undefined' ||
        !menuContainer
    ) {
        console.error('Menu script exit');
        return;
    }

    const buttons = document.querySelectorAll('.upload_images_button');

    buttons.forEach((button) => {
        const targetInputId = button.getAttribute('data-target');
        const inputField = document.querySelector(targetInputId);
        const previewContainerId =
            'menu-item-image-previews-' + inputField.id.split('-').pop();
        const previewContainer = document.getElementById(previewContainerId);

        previewContainer &&
            updateRemoveButtonsHandler(previewContainer, inputField);

        button.addEventListener('click', function (event) {
            event.preventDefault();
            console.log('Clikk for picture');
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

                    const imageIds = attachments.map(
                        (attachment) => attachment.id
                    );

                    const existingIds = inputField.value
                        ? JSON.parse(inputField.value)
                        : [];
                    const allIds = existingIds.concat(imageIds);

                    inputField.value = JSON.stringify(allIds);
                    previewContainer.innerHTML = '';
                    allIds.forEach((id) => {
                        const imgDiv = document.createElement('div');
                        imgDiv.classList.add('menu-item-image-preview');
                        const wrapperDiv = document.createElement('div');
                        wrapperDiv.classList.add(
                            'menu-item-image-preview-wrapper'
                        );

                        const img = document.createElement('img');
                        img.src = wp.media.attachment(id).get('url');

                        const removeButton = document.createElement('button');
                        removeButton.classList.add(
                            'button',
                            'remove_image_button'
                        );
                        removeButton.textContent = 'X';
                        removeButton.setAttribute('data-image-id', id);

                        removeButton.addEventListener('click', function (e) {
                            e.preventDefault();
                            const idToRemove =
                                this.getAttribute('data-image-id');
                            const updatedIds = JSON.parse(
                                inputField.value
                            ).filter((imageId) => imageId != idToRemove);
                            inputField.value = JSON.stringify(updatedIds);
                            this.parentElement.remove();
                        });

                        imgDiv.appendChild(wrapperDiv);
                        wrapperDiv.appendChild(img);
                        wrapperDiv.appendChild(removeButton);
                        previewContainer.appendChild(imgDiv);
                    });

                    // Re-assign remove button events
                    updateRemoveButtonsHandler(previewContainer, inputField);
                })
                .open();
        });
    });

    function updateRemoveButtonsHandler(element, inputField) {
        const removeButtons = element.querySelectorAll('.remove_image_button');

        if (removeButtons.length > 0) {
            removeButtons.forEach((button) => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const idToRemove = this.getAttribute('data-image-id');
                    const updatedIds = JSON.parse(inputField.value).filter(
                        (imageId) => imageId != idToRemove
                    );
                    inputField.value = JSON.stringify(updatedIds);
                    this.parentElement.remove();
                });
            });
        }
    }

    function toggleCustomFields() {
        const menuItems = document.querySelectorAll('.menu-edit .menu-item');
        menuItems.forEach((item, index) => {
            const depth = parseInt(
                item?.className?.match(/menu-item-depth-(\d+)/)[1]
            );
            const hasChildren =
                index < menuItems.length - 1
                    ? menuItems[index + 1]?.className.includes(
                          'menu-item-depth-1'
                      )
                    : false;
            const customFields = item.querySelectorAll(
                '.field-custom, .my-admin-upload-button'
            );
            const customPictures = item.querySelector(
                '.menu-item-image-previews'
            );

            if (depth > 0 || !hasChildren) {
                if (customPictures) customPictures.style.display = 'none';
                customFields.length > 0 &&
                    customFields.forEach((field) => {
                        field.style.display = 'none';
                    });
            } else {
                if (customPictures) customPictures.style.display = 'flex';
                customFields.length > 0 &&
                    customFields.forEach((field) => {
                        field.style.display = 'block';
                    });
            }
        });
    }

    toggleCustomFields();

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
    } else {
        console.error('.menu-edit not found.');
    }
});
document.addEventListener('DOMContentLoaded', function () {
    let fileFrame;

    function uploadListingImage(button) {
        const buttonId = button.id;
        const fieldId = buttonId.replace('_button', '');
        const inputField = document.getElementById(fieldId);

        // If the media frame already exists, reopen it.
        if (fileFrame) {
            fileFrame.open();
            return;
        }

        // Create the media frame.
        fileFrame = wp.media({
            title: button.getAttribute('data-uploader_title'),
            button: {
                text: button.getAttribute('data-uploader_button_text'),
            },
            multiple: false,
        });

        // When an image is selected, run a callback.
        fileFrame.on('select', function () {
            const attachment = fileFrame
                .state()
                .get('selection')
                .first()
                .toJSON();
            if (inputField) {
                inputField.value = attachment.id;
            }
            const imgElement = document.querySelector('#listingimagediv img');
            if (imgElement) {
                imgElement.src = attachment.url;
                imgElement.style.display = 'block';
            }
            button.id = 'remove_listing_image_button';
            button.textContent = 'Remove listing image';
        });

        // Finally, open the modal
        fileFrame.open();
    }

    function handleClick(event) {
        event.preventDefault();
        const button = event.target;

        if (button.id === 'upload_listing_image_button') {
            uploadListingImage(button);
        } else if (button.id === 'remove_listing_image_button') {
            const inputField = document.getElementById('upload_listing_image');
            if (inputField) {
                inputField.value = '';
            }
            const imgElement = document.querySelector('#listingimagediv img');
            if (imgElement) {
                imgElement.src = '';
                imgElement.style.display = 'none';
            }
            button.id = 'upload_listing_image_button';
            button.textContent = 'Set listing image';
        }
    }
    //improvment needed : add event on not existing dom element body.addEventListener=>e.target->check
    const listingImageDiv = document.getElementById('listingimagediv');
    if (listingImageDiv) {
        listingImageDiv.addEventListener('click', handleClick);
    } else {
        console.error('#listingimagediv not found.');
    }
});
