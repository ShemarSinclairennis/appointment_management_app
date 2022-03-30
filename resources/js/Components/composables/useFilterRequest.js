import { Inertia } from '@inertiajs/inertia';
import useObjectHelper from '@/composables/useObjectHelper';
import { reactive, watch } from 'vue';

export default function useFilterRequest(routeName, extraParams = null) {
  const params = reactive({
    query: route().params?.query,
    page: route().params?.page
  });

  if (extraParams) {
    Object.assign(params, extraParams);
  }

  function search() {
    const { filterNullValues } = useObjectHelper();

    Inertia.get(route(routeName), filterNullValues(params), {
      preserveScroll: true,
      preserveState: true
    });
  }

  function paramWatcher() {
    const watcher = watch(
      params,
      value => {
        if ((value.query || value.query === '') && params.page) {
          console.log('bleh');
          watcher();
          params.page = null;
          paramWatcher();
        }

        search();
      },
      { deep: true }
    );
  }

  paramWatcher();

  return { params, search };
}
