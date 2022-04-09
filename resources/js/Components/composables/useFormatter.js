export default function useFormatter() {
    function formatDate(dateString) {
        let date = new Date(dateString);
        let options = { year: "numeric", month: "short", day: "numeric" };
        return date.toLocaleDateString("en-US", options);
    }

    return { formatDate };
}
