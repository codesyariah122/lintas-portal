/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
 * @return {ReactElemnt || ReactNode}
 * */

import * as React from "react";
import "@/styles/globals.css";
import type { AppProps } from "next/app";
import { NextPage } from "next";
import type { AppProps } from "next/app";
import {
  Hydrate,
  QueryClient,
  QueryClientProvider,
} from "@tanstack/react-query";
import { ReactQueryDevtools } from "@tanstack/react-query-devtools";
import { AnyObject } from "@/types";

export type NextPageWithLayout<P = AnyObject, IP = P> = NextPage<P, IP> & {
  getLayout?: (page: React.ReactElement) => React.ReactNode;
};

type AppPropsWithLayout = AppProps & {
  Component?: NextPageWithLayout;
};

function App({ Component, pageProps }: AppPropsWithLayout) {
  const getLayout = Component?.getLayout ?? ((page) => page);
  const [queryClient] = React.useState(() => new QueryClient());

  return (
    <QueryClientProvider client={queryClient}>
      <Hydrate state={pageProps.dehydratedState}>
        {/* <Component {...pageProps} /> */}
        {getLayout(<Component {...pageProps} />)}
        <ReactQueryDevtools />
      </Hydrate>
    </QueryClientProvider>
  );
}
export default App;
