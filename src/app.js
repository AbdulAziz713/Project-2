document.addEventListener("alpine:init", () => {
  Alpine.data("products", () => ({
    items: [{ id: 1, name: Sederhana, img: "asd.jpg", price: 10000 }],
    open: false,

    toggle() {
      this.open = !this.open;
    },
  }));
});
