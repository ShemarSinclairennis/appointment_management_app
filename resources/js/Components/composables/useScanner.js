export default function useScanner() {
  function parseShipmentNumber(shipmentNumber) {
    const number = Number(shipmentNumber);

    if (!number) {
      return shipmentNumber;
    }

    return number;
  }

  function parseBarcode(barcode) {
    const shipmentNumberPattern = /88[eE]8-\d+-1[zZ]/;

    if (shipmentNumberPattern.test(barcode)) {
      return barcode.split('-')[1];
    }

    return parseShipmentNumber(barcode);
  }

  return { parseBarcode };
}
