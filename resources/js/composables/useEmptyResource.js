import { computed } from 'vue';
import usePageLoaded from '@/composables/usePageLoaded';

/**
 *
 * @param {Object} resources
 * @returns {{resourceEmpty: ComputedRef<unknown>}}
 */
export default function useEmptyResource(resources) {
  const { pageLoaded } = usePageLoaded();

  const resourceEmpty = computed(
    () =>
      pageLoaded.value &&
      (resources.value.data?.length ?? resources.value.length) === 0
  );

  return { resourceEmpty };
}
