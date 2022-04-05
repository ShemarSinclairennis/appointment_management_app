import { onMounted, onUnmounted, ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default function usePageLoaded() {
  const pageLoaded = ref(false);

  onUnmounted(
    Inertia.on('start', () => {
      pageLoaded.value = false;
    })
  );

  onMounted(() => (pageLoaded.value = true));

  Inertia.on('finish', () => {
    pageLoaded.value = true;
  });

  return { pageLoaded };
}
