export default function useObjectHelper() {
  function filterNullValues(obj) {
    Object.keys(obj).forEach(key => {
      let tempArray;

      if (Array.isArray(obj[key])) {
        tempArray = obj[key].filter(item => item);
      }

      if (tempArray?.length === 0) {
        delete obj[key];

        return;
      }

      if (!obj[key]) delete obj[key];
    });

    return obj;
  }

  function resetObject(obj) {
    Object.keys(obj).forEach(key => {
      const property = obj[key];

      if (property instanceof Array) {
        return (obj[key] = []);
      }

      if (property instanceof Object) {
        return (obj[key] = {});
      }

      return (obj[key] = null);
    });
  }

  return { filterNullValues, resetObject };
}
