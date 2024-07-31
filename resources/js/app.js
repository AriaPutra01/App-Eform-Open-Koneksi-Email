import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const ipSourceContainer = document.getElementById("ipSourceContainer");
    const ipDestinationContainer = document.getElementById(
        "ipDestinationContainer"
    );
    const portContainer = document.getElementById("portContainer");
    const addFieldsButton = document.getElementById("addFields");

    addFieldsButton.addEventListener("click", function () {
        addFieldsButton.classList.add("hidden");
        // IP Source
        const newIpSourceInput = document.createElement("input");
        newIpSourceInput.type = "text";
        newIpSourceInput.name = "ipSource[]";
        newIpSourceInput.id = "ipSource";
        newIpSourceInput.classList.add(
            "block",
            "w-full",
            "mt-5",
            "border-gray-300",
            "bg-gray-100",
            "focus:border-sky-500",
            "focus:ring-sky-500",
            "rounded-md",
            "shadow-sm"
        );
        ipSourceContainer.appendChild(newIpSourceInput);

        // IP Destination
        const newIpDestinationInput = document.createElement("input");
        newIpDestinationInput.type = "text";
        newIpDestinationInput.name = "ipDestination[]";
        newIpDestinationInput.id = "ipDestination";
        newIpDestinationInput.classList.add(
            "block",
            "w-full",
            "mt-5",
            "border-gray-300",
            "bg-gray-100",
            "focus:border-sky-500",
            "focus:ring-sky-500",
            "rounded-md",
            "shadow-sm"
        );
        ipDestinationContainer.appendChild(newIpDestinationInput);

        // PORT
        const newPortInput = document.createElement("input");
        newPortInput.type = "number";
        newPortInput.name = "port[]";
        newPortInput.id = "port";
        newPortInput.classList.add(
            "block",
            "w-full",
            "mt-5",
            "border-gray-300",
            "bg-gray-100",
            "focus:border-sky-500",
            "focus:ring-sky-500",
            "rounded-md",
            "shadow-sm"
        );
        portContainer.appendChild(newPortInput);

        // REMOVE
        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.classList.add(
            "text-red-500",
            "font-medium",
            "hover:text-red-700",
            "mt-5",
            "px-3",
            "py-2",
            "rounded-md",
            "shadow-sm",
            "outline-none"
        );
        removeButton.addEventListener("click", function () {
            addFieldsButton.classList.remove("hidden");
            ipSourceContainer.removeChild(newIpSourceInput);
            ipDestinationContainer.removeChild(newIpDestinationInput);
            portContainer.removeChild(newPortInput);
            removeButton.parentNode.removeChild(removeButton);
        });
        newIpSourceInput.parentNode.appendChild(removeButton);
    });
});
